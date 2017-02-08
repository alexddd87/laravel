<?php
namespace App\Services;

use App\Models\Content;

class ContentService extends BaseService
{
    public function __construct()
    {
        $this->model = app(Content::class);
    }
}
