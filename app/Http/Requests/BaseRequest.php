<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
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
     * Apply method determine to rules.
     *
     * @return array
     */
    public function rules()
    {
        $method = strtolower($this->method()) . 'Action';
        if (method_exists($this, $method)) {
            return $this->$method;
        }

        return [];
    }
}