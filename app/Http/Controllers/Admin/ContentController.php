<?php

namespace App\Http\Controllers\Admin;


use App\Models\Content;

class ContentController extends AdminController
{
    protected $service;

    public function __construct()
    {
        $this->service = app(Content::class);
    }
}
