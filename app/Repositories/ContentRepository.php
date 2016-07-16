<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16.07.16
 * Time: 15:22
 */

namespace App\Repositories;


use App\Models\Content;


class ContentRepository extends  Repository {

    /**
     * Configure the Model
     *
     **/
    public function model()
    {
        return Content::class;
    }
}