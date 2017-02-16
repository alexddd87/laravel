<?php

namespace App\Http\Requests;

class ContentRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rulesArray()
    {
        return [
            'name' => 'required|string',
            'url' => 'required|string',
            'body' => 'string',
        ];
    }

    /**
     * Post method rules apply.
     */
    public function rules()
    {
        return $this->rulesArray();
    }

    /**
     * Put method rules apply.
     */
    protected function putAction()
    {
        return $this->rulesArray();
    }
}