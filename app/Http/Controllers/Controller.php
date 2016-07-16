<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function __construct() {


    }


    public function messageAdmin($text, $type='')
    {
        if($type=='error')
            return (string) View::make('admin.messageErr', array(
                'text'=>$text,
            ));
        else
            return (string) View::make('admin.messageDone', array(
                'text'=>$text,
            ));

    }
}
