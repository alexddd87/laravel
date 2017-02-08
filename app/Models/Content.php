<?php

namespace App\Models;

class Content extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sub_id', 'name', 'body', 'url', 'enabled', 'sort'
    ];

}
