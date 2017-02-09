<?php

namespace App\Models;

class Product extends BaseModel
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
