<?php

namespace App\Http\Requests\Concerns;

/**
 * Merges dial_code and phone into a single phone value before validation.
 * Use on any Form Request that receives dial_code + phone from intl-tel-input.
 */
trait MergesDialCodeIntoPhone
{
    protected function prepareForValidation(): void
    {
        merge_dial_code_into_phone($this);
    }
}
