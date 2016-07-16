<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Content extends BaseModel
{
    public $timestamps = false;

    public static $rules = ['name' => 'required', 'slug' => 'required'];
    protected $fillable = [
        'name',
        'body',
        'slug',
        'sub_id',
        'enabled',
    ];


    public function scopeEnabled($query)
    {
        $query->where('enabled', '=', 1);
    }
}