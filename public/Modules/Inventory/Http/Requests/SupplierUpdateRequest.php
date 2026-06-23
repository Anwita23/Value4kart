<?php

namespace Modules\Inventory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $id = $this->route('id');
        $vendorId = $this->input('vendor_id') ?? auth()->user()->vendor()?->vendor_id;

        return [
            'name' => ['required'],
            'email' => [
                'nullable',
                'email:rfc,dns',
                Rule::unique('suppliers', 'email')->ignore($id)->where('vendor_id', $vendorId),
            ],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
