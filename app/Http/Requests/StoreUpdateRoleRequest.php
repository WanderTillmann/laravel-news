<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRoleRequest extends FormRequest
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

        $rules = [
            'name' => [
                'required',
                'min:3',
                'max:160',
                'unique:roles,name,{$id},id'
            ],
            'permission' => ['required', 'nullable'],
        ];
        return $rules;
    }
}
