<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (is_null(auth()->user()->company_id)) {
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
            //
            'name' => 'required|string|max:255',
            'type' => 'required',
            'cr' => 'required|regex:/^[0-9]+$/',
            'vat' => 'required|regex:/^[0-9]+$/',
            'main_services' => 'required',
            'establishment_year' => 'required|integer|between:1900,2020',
            'total_employees' => 'integer|between:0,99999',
            'bio' => 'string|max:255',
            'telephone' => 'required|regex:/[0-9]/|unique:companies,telephone',
            'fax' => 'required|regex:/[0-9]/|unique:companies,fax',
            'email' => 'required|string|email|max:255|unique:companies,email',
            'website' => 'string',
            'country' => 'required|exists:countries,name',
            'city' => 'required',
            'po_box' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'location' => 'required',
            //'admin' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email is required!'
        ];
    }
}
