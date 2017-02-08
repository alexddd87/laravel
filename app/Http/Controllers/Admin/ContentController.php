<?php

namespace App\Http\Controllers\Admin;

use App\Services\ContentService;
use App\Http\Requests\ContentRequest;

class ContentController extends AdminController
{
    public function __construct()
    {
        $this->service = app(ContentService::class);
        $this->request = ContentRequest::class;
        $this->moduleName = 'content';
    }
}
