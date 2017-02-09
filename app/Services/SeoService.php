<?php
namespace App\Services;

use App\Models\Seo;

class SeoService extends BaseService
{
    public function __construct()
    {
        $this->model = app(Seo::class);
    }
}