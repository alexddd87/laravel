<?php

namespace App\Http\Controllers\admin;

use App\Models\Common;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function enable(Request $request, Common $common)
    {
        if( $common->enableItem($request->tb, $request->id, $request->enable) )return $this->messageAdmin('Данные сохранены!');
        else return $this->messageAdmin('При сохранение произошли ошибки!');
    }
}
