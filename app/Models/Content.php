<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $timestamps = false;

    static $rules = array('name' => 'required|min:2|max:300', 'url' => 'required|min:1|max:100');
    protected $fillable = array(
        'url',
        'sub',
        'active',
    );


    static function getListContent()
    {
        return Content::get();
    }


    static function getContent($id)
    {
        return Content::find($id);
    }


    static function saveContent($request, $id)
    {
        $item = self::find($id);
        $item->url = $request::input('url');

        $sub=$request::input('sub_id');
        if($sub==0)$sub=NULL;
        $item->sub_id = $sub;
        $item->active = $request::input('active');
        $item->name = $request::input('name');
        $item->body = $request::input('body');
        $item->save();
    }


    static function createContent($data)
    {
        $item = self::create($data);
        $id = $item->id;
    }

}
