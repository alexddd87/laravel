<?php

namespace App\Http\Requests;

class SeoRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rulesArray()
    {
        return [
            'url' => 'required|string',
            'title' => 'string',
            'keywords' => 'string',
            'description' => 'string',
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