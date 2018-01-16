<?php

namespace Moduvel\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class LoginFormRequest extends FormRequest
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
            'email' => ['required'],
            'password' => ['required'],
        ];
    }

    /**
     * Get the attributes values.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => trans('moduvel-core::login.form.email'),
            'password' => trans('moduvel-core::login.form.password'),
        ];
    }
}