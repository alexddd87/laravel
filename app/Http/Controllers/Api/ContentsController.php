<?php

namespace App\Http\Controllers\Api;

use App\Services\ContentService;
use App\Http\Requests;
use Illuminate\Http\Request;


class ContentsController extends ApiController
{

    public function __construct()
    {
        $this->service = app(ContentService::class);
        $this->request = $this->getRequest();

        parent::__construct($this);
    }
}