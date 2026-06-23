<?php

namespace Modules\Inventory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $vendorId = $this->input('vendor_id') ?? auth()->user()->vendor()?->vendor_id;

        $emailRule = app()->runningUnitTests() ? 'email' : 'email:rfc,dns';

        return [
            'name' => 'required',
            'email' => [
                'required',
                $emailRule,
                Rule::unique('suppliers', 'email')->where('vendor_id', $vendorId),
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
