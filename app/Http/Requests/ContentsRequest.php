<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Content;

class ContentsRequest extends BaseRequest
{
    public function __construct()
    {
        parent::__construct(app(Content::class));
    }
}
