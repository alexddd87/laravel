<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\RatesContract;
use App\Http\Requests;
use Illuminate\View\View;

class MainController extends Controller
{

    public function index(RatesContract $rates){
        $rate=$rates->getRate();
        return view('rates',['rate'=>$rate]);
    }

}
