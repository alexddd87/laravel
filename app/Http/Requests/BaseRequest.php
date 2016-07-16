<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16.07.16
 * Time: 18:44
 */

namespace App\Http\Requests;


class BaseRequest extends Request {


    public function __construct($model = null)
    {
        $this->model = $model;

    }

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
        if (!isset($this->model->rules)) {
            return [];
        }
        return $this->model->rules;
    }

}