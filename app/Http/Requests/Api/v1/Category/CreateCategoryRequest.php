<?php

namespace App\Http\Requests\Api\v1\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'name' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
        ];
    }

    /**
    * Get the proper failed validation response for the request.
    *
    * @param  array  $errors
    * @return \Symfony\Component\HttpFoundation\Response
    */
    public function response(array $errors)
    {
        $response['messages'] = $errors;

        return response()->json($response);
    }
}
