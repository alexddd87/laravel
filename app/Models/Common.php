<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Common extends Model
{
    public function enableItem($tb, $id, $enable)
    {
        if( DB::table($tb)->where('id', $id)->update(['enabled' => $enable]) )
        {
            return true;
        }
        return false;
    }


}
