<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Content extends BaseModel
{
    public $timestamps = false;

    public static $rules = ['name' => 'required', 'url' => 'required'];
    protected $fillable = [
        'name',
        'body',
        'url',
        'sub_id',
        'active',
    ];


    public function scopeActive($query)
    {
        $query->where('active', '=', 1);
    }
}