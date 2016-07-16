<?php

namespace App\Helpers;

Interface RatesContract
{

    public function getRate($cur='USD');

}