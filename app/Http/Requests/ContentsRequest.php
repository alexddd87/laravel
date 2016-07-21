<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Content;

class ContentsRequest extends Request
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
        $method = $this->method();
        if ($method == 'PUT' || $method == 'POST') {
            $rules = Content::$rules;
        }
        else {
             $rules = [];
        }
        return $rules;
    }
}
