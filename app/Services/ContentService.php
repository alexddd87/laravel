<?php namespace App\Services;

use App\Transformers\Transformer;
use App\Repositories\ContentRepository;

class ContentService extends BaseService
{

    public function __construct()
    {
        $this->repository = app(ContentRepository::class);
        $this->transformer = app(Transformer::class);
    }

}