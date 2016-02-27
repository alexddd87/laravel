<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $timestamps = false;
    static $tb = 'contents';
    static $name = 'Контент';
    static $adminLang = 'ru';

    static $rules = array('name' => 'required|min:2|max:300', 'url' => 'required|min:1|max:100');
    protected $fillable = array(
        'url',
        'sub',
        'active',
    );


    static function getListContent()
    {
        $list = Content::get();

        return $list;
    }

    static function getContent($id)
    {
        return Content::find($id);
    }

    static function saveData($id)
    {
        $item = self::find($id);
        $item->url = Input::get('url');

        $sub=Input::get('sub_id');
        if($sub==0)$sub=NULL;
        $item->sub_id = $sub;
        $item->active = Input::get('active');
        $item->save();

        DB::table('ru_contents')
            ->where('contents_id', $id)
            ->update(array(
                'name' => Input::get('name'),
                'body' => Input::get('body')
            ));
    }

    static function createData($data)
    {
        $item = self::create($data);
        $id = $item->id;

        DB::table(self::$adminLang.'_contents')->insert(
            array(
                'contents_id' => $id,
                'name' => Input::get('name'),
                'body' => Input::get('body'))
        );
    }

}
