<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'theme' => 'required|min:3|max:128',
            'message' => 'required|min:3|max:65535',
            'document' => 'nullable|file|mimes:png,jpeg,jpg,pdf',
        ];
    }

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
