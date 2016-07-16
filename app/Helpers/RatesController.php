<?php

namespace App\Helpers;

use App\Helpers\RatesContract;
use SimpleXMLElement;

class RatesController implements RatesContract
{

    public function getRate($cur='USD'){

        $xml=$this->getXML();
        return $this->procXML($xml,$cur);

    }
    private function getXML(){
        $url='http://www.cbr.ru/scripts/XML_daily.asp';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        return $result=curl_exec($ch);
    }

    private function procXML($xml, $cur){
        $rates=new SimpleXMLElement($xml);
        foreach ($rates->Valute as $rate){
            if ($rate->CharCode==$cur){
                return (string)$rate->Value;
            }
        }
    }

}