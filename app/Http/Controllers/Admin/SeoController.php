<?php

namespace App\Http\Controllers\Admin;

use App\Services\SeoService;
use App\Http\Requests\SeoRequest;

class SeoController extends AdminController
{
    public function __construct()
    {
        $this->service = app(SeoService::class);
        $this->request = SeoRequest::class;
        $this->moduleName = 'seo';
    }
}
