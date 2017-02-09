<?php

namespace App\Models;

class Seo extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'keywords', 'description', 'url', 'body', 'enabled'
    ];

}
