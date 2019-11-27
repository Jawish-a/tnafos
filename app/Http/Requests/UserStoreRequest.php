<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!is_null(auth()->user()->company_id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'first_name', 'last_name', 'gender', 'birth_date', 'mobile', 'email', 'password',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:m,f',
            'email' => 'required|string|email|max:255|unique:users,email',
            'mobile' => 'required|regex:/[0-9]/|unique:users,mobile',
        ];
    }
}
