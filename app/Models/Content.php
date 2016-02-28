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


    public function getListContent()
    {
        return $this->get();
    }


    public function getContent($id)
    {
        return $this->find($id);
    }


    public function saveContent($request, $id)
    {
        $item = $this->find($id);
        $item->url = $request->input('url');

        $sub=$request->input('sub_id');
        if($sub==0)$sub=NULL;
        $item->sub_id = $sub;
        $item->active = $request->input('active');
        $item->name = $request->input('name');
        $item->body = $request->input('body');
        $item->save();
    }


    public function createContent($data)
    {
        $item = $this->create($data);
        $id = $item->id;
    }

    public function deleteContent($id)
    {
        $this->Destroy($id);
    }

}
