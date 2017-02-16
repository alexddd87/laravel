<?php

namespace App\Http\Controllers\Admin;

use App\Services\ContentService;
use App\Http\Requests\ContentRequest;
use Illuminate\Support\Facades\View;

class ContentController extends AdminController
{
    public function __construct()
    {
        $this->service = app(ContentService::class);
        $this->request = ContentRequest::class;
        $this->module = 'content';
        $this->moduleName = 'Контент';

        View::share('module', $this->module);
        View::share('moduleName', $this->moduleName);
    }
}