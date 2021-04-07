<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
                'min:5',
                'max:160',
            ],
            'email' => ['required', 'email:rfc,dns'],
            'description' => ['min:5', 'max:10000', 'nullable'],
            'image' => ['required', 'image'],
            'roles' => ['nullable']
        ];
        if ($this->method() == 'PUT') {
            $rules['image'] = ['nullable', 'image'];
        }
        return $rules;
    }
}
