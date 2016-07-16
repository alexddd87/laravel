<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\ApiController;
use App\Services\ContentService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Content;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


class ContentsController extends ApiController
{

    public function __construct(Router $route)
    {
        $this->service = app(ContentService::class);
        $this->request = $this->getRequest();

        parent::__construct($this);
    }

}