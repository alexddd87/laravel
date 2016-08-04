<?php

namespace App\Models;

class News extends BaseModel
{
    public $timestamps = false;

    public static $rules = ['name' => 'required', 'url' => 'required'];
    protected $fillable = [
        'name',
        'body',
        'url',
        'active',
    ];

}