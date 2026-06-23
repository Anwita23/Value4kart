<?php

/**
 * @author TechVillage <support@techvill.org>
 *
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 *
 * @created 29-07-2021
 */

namespace App\Http\Controllers;

use App\Http\Resources\AjaxSelectSearchResource;
use App\Models\Category;
use App\Models\Language;
use App\Models\Vendor;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Modules\Commission\Http\Models\Commission;
use Modules\MediaManager\Http\Models\ObjectFile;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService
    ) {}

    /**
     * Category List
     *
     * @param  CategoryListDataTable  $dataTable
     * @return mixed
     */
    public function index()
    {
        $data['vendors'] = Vendor::getAll()->where('status', 'Active')->all();
        $data['commission'] = Commission::getAll()->first();
        $data['languages'] = Language::getAll()->where('status', 'Active');

        return view('admin.category.index', $data);
    }

    /**
     * return data for jstree
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData()
    {
        return response()->json($this->categoryService->getTreeData('admin'));
    }

    /**
     * Store Category
     *
     * @return array
     */
    public function store(Request $request)
    {
        return $this->categoryService->store($request);
    }

    /**
     * Edit Category
     *
     * @param  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request)
    {
        $category = Category::where('id', $request->id)->first();

        if (! empty($category)) {
            $objectFile = ObjectFile::where('object_type', 'categories')
                ->where('object_id', $category->id)
                ->first();
            $data = [
                'name' => $category->getTranslated('name', request()->input('lang', config('app.locale'))),
                'slug' => $category->getTranslated('slug', request()->input('lang', config('app.locale'))),
                'status' => $category->status,
                'is_searchable' => $category->is_searchable,
                'is_featured' => $category->is_featured,
                'sell_commissions' => $category->sell_commissions,
                'parent_id' => $category->parent_id,
                'parent_name' => $category->category?->getTranslated('name', request()->input('lang', config('app.locale'))),
                'image_path' => $category->fileUrl(),
                'image_id' => $objectFile ? $objectFile->file_id : null,
            ];

            return json_encode($data);
        }
    }

    /**
     * Update Category
     *
     * @return array
     */
    public function update(Request $request)
    {
        return $this->categoryService->update($request);
    }

    /**
     * Remove Category
     *
     * @return array
     */
    public function destroy(Request $request)
    {
        $response = ['status' => 0];
        $id = $request->id;

        if ($request->isMethod('post')) {
            $result = $this->checkExistence($id, 'categories');

            if ($result['status'] === true && $id != 1) {
                $response = $this->categoryService->remove((int) $id);
            }
        }

        return $response;
    }

    /**
     * return parent data
     *
     * @return false|int|string
     */
    public function getParentData(Request $request)
    {
        if ($request->create_child == 1) {
            $cateInfo = Category::getAll()->where('id', $request->id)->first();
            $parentInfo = Category::getAll()->where('id', $cateInfo->parent_id)->first();

            return json_encode($parentInfo);
        }

        return 0;

    }

    /**
     * drag and drop js tree
     *
     * @return int[]
     */
    public function moveNode(Request $request)
    {
        $response = ['status' => 0];

        if ($request->data['parent'] != 1) {
            $request['id'] = $request->data['id'];
            $request['parent_id'] = $request->data['parent'];
            $request['old_parent_id'] = $request->data['old_parent'];
            $request['position'] = $request->data['position'];
            $request['old_position'] = $request->data['old_position'];

            if ((new Category())->nodeUpdate($request->only('id', 'parent_id', 'old_parent_id', 'position', 'old_position'))) {
                $response['status'] = 1;
            }
        }

        if ($response['status'] == 0) {
            $response['error'] = __('Not Permitted');
        }

        return $response;
    }

    /**
     * Find Category
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findCategory(Request $request)
    {
        $categories = Category::whereLike('name', $request->q)->limit(10)->get();

        return AjaxSelectSearchResource::collection($categories);
    }
}
