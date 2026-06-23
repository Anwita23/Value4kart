<?php

namespace App\Services;

use App\Models\Category;
use App\Models\VendorCategory;
use Illuminate\Http\Request;

class CategoryService
{
    /**
     * Build jstree payload for category tree.
     *
     * @param  string  $context  'admin' or 'vendor'
     * @param  int|null  $vendorId  Required when context is 'vendor'
     * @return array
     */
    public function getTreeData(string $context, ?int $vendorId = null): array
    {
        $lang = request()->input('lang', config('app.locale'));

        if ($context === 'admin') {
            $categories = Category::parents('admin')
                ->where('id', '!=', 1)
                ->sortBy('order_by');
        } else {
            $categories = Category::whereNull('parent_id')
                ->where('id', '!=', 1)
                ->whereHas('vendorCategory', function ($query) use ($vendorId) {
                    $query->where('vendor_id', $vendorId);
                })
                ->orderBy('order_by', 'ASC')
                ->with('childrenCategories')
                ->get();
        }

        $data = [];
        $children = [];
        $subChildren = [];

        foreach ($categories as $category) {
            $categoriesChild = $context === 'admin'
                ? $category->childrenCategories->where('is_global', 1)->sortBy('order_by')
                : $category->childrenCategories->sortBy('order_by');

            foreach ($categoriesChild as $child) {
                if ($context === 'vendor') {
                    $vendorCategoryExists = VendorCategory::where('category_id', $child->id)
                        ->where('vendor_id', $vendorId)->exists();
                    if (! $vendorCategoryExists) {
                        continue;
                    }
                }

                $subChilds = $context === 'admin'
                    ? $child->childrenCategories->where('is_global', 1)->sortBy('order_by')
                    : $child->childrenCategories->sortBy('order_by');

                foreach ($subChilds as $subChild) {
                    if ($context === 'vendor') {
                        $vendorCategoryExists = VendorCategory::where('category_id', $subChild->id)
                            ->where('vendor_id', $vendorId)->exists();
                        if (! $vendorCategoryExists) {
                            continue;
                        }
                    }

                    $subChildren[$subChild->parent_id][] = [
                        'text' => $subChild->getTranslated('name', $lang),
                        'slug' => $subChild->getTranslated('slug', $lang),
                        'id' => $subChild->id,
                        'parent_id' => $subChild->parent_id,
                        'create_child' => 0,
                        'status' => $subChild->status ?? 'Active',
                        'image' => method_exists($subChild, 'fileUrl') ? $subChild->fileUrl() : '',
                    ];
                }

                $children[$child->parent_id][] = [
                    'text' => $child->getTranslated('name', $lang),
                    'slug' => $child->getTranslated('slug', $lang),
                    'id' => $child->id,
                    'state' => ['opened' => false],
                    'parent_id' => $child->parent_id,
                    'create_child' => 1,
                    'status' => $child->status ?? 'Active',
                    'image' => method_exists($child, 'fileUrl') ? $child->fileUrl() : '',
                    'children' => $subChildren[$child->id] ?? null,
                ];
            }

            $data[] = [
                'text' => $category->getTranslated('name', $lang),
                'slug' => $category->getTranslated('slug', $lang),
                'id' => $category->id,
                'state' => [
                    'opened' => true,
                    'disabled' => $category->id == 1,
                ],
                'create_child' => $category->id != 1 ? 1 : '',
                'status' => $category->status ?? 'Active',
                'image' => method_exists($category, 'fileUrl') ? $category->fileUrl() : '',
                'children' => $children[$category->id] ?? null,
            ];
        }

        return $data;
    }

    /**
     * Store a category.
     *
     * @return array{status: int, category_id?: int, error?: string}
     */
    public function store(Request $request): array
    {
        $response = ['status' => 0];

        if (! $request->isMethod('post')) {
            return $response;
        }

        if (isset($request->parent_id) && $request->parent_id == 1) {
            $response['error'] = __('Not Permitted');

            return $response;
        }

        $maxValue = 1;
        if (! isset($request->parent_id)) {
            $maxValue += Category::getAll()->whereNull('parent_id')->max('order_by');
        } else {
            $maxValue += Category::getAll()->where('parent_id', $request->parent_id)->max('order_by');
        }

        $request->merge([
            'order_by' => $maxValue,
            'is_global' => $request->is_global ?? 1,
        ]);

        $validator = Category::storeValidation($request->all());
        if ($validator->fails()) {
            $response['error'] = $validator->errors()->first();

            return $response;
        }

        $lang = request()->input('lang', config('app.locale'));
        $existsSlug = Category::whereRaw('JSON_VALID(slug)')
            ->where("slug->{$lang}", $request->slug)
            ->first();

        if (! empty($existsSlug)) {
            $response['error'] = __('The slug has already been taken.');

            return $response;
        }

        $categoryId = (new Category())->store(
            $request->only('parent_id', 'status', 'is_searchable', 'is_featured', 'order_by', 'sell_commissions', 'is_global')
        );

        $categoryDetail = Category::where('id', $categoryId)->first();
        if ($categoryDetail) {
            $categoryDetail->setTranslation('name', $lang, $request->name);
            $categoryDetail->setTranslation('slug', $lang, $request->slug);
            $categoryDetail->save();
        }

        $response['status'] = 1;
        $response['category_id'] = $categoryId;

        return $response;
    }

    /**
     * Update a category.
     *
     * @return array{status: int, error?: string}
     */
    public function update(Request $request): array
    {
        $response = ['status' => 0];

        if (! $request->isMethod('post')) {
            return $response;
        }

        $id = $request->edit_id;
        if ($id == 1) {
            return $response;
        }

        $validator = Category::updateValidation($request->all(), $id);
        if ($validator->fails()) {
            $response['error'] = $validator->errors()->first();

            return $response;
        }

        $lang = request()->input('lang', config('app.locale'));
        $existsSlug = Category::whereRaw('JSON_VALID(slug)')
            ->where("slug->{$lang}", $request->slug)
            ->where('id', '!=', $id)
            ->first();

        if (! empty($existsSlug)) {
            $response['error'] = __('The slug has already been taken.');

            return $response;
        }

        if (! (new Category())->updateCategory(
            $request->only('parent_id', 'status', 'is_searchable', 'is_featured', 'sell_commissions'),
            $id
        )) {
            return $response;
        }

        $details = Category::where('id', $id)->first();
        if ($details) {
            $details->setTranslation('name', $lang, $request->name);
            $details->setTranslation('slug', $lang, $request->slug);
            $details->save();
        }

        $response['status'] = 1;

        return $response;
    }

    /**
     * Remove a category by id.
     *
     * @return array{status: int, error?: string}
     */
    public function remove(int $id): array
    {
        $response = (new Category())->remove($id);
        $success = isset($response['status']) && $response['status'] === 'success';

        $result = ['status' => $success ? 1 : 0];
        if (! $success && isset($response['message'])) {
            $result['error'] = $response['message'];
        }

        return $result;
    }
}
