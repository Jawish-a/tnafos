<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'name', 'description', 'rate','unit', 'type'
            'name' => 'required|string|max:255',
            'description' => 'required',
            'rate' => 'required|regex:/^[0-9]+$/',
            'unit' => 'required',
            'type' => 'required|in:hourly,project',
        ];
    }
}
