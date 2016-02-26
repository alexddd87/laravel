<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 25.02.16
 * Time: 17:50
 */

namespace App\Http\Controllers;


class HomeController extends Controller
{

    function index() {
        return view('welcome');
    }
}