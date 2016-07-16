<?php
namespace App\Services;

use App\Events\RegisterNewDomain;
use App\Transformers\Transformer;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;
use App\Repositories\ContentRepository;
use App\Transformers\AccountTransformer;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class ContentService extends BaseService
{

    public function __construct()
    {
        $this->repository = app(ContentRepository::class);
        $this->transformer = app(Transformer::class);
    }


}