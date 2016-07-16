<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Content extends BaseModel
{
    public $timestamps = false;

    public $rules = array('name' => 'required|min:2|max:300', 'slug' => 'required|min:1|max:100');
    protected $fillable = array(
        'name',
        'body',
        'slug',
        'sub_id',
        'enabled',
    );


    public function getListContent()
    {
        return $this->orderBy('sort', 'ASC')->get();
    }

    public function getContent($id)
    {
        return $this->find($id);
    }

    public function saveContent($request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if($validator->fails()){
            return $validator;
        }

        $item = $this->find($id);
        $item->slug = $request->input('slug');

        $sub=$request->input('sub_id');
        if($sub==0)$sub=NULL;
        $item->sub_id = $sub;
        $item->enabled = $request->input('enabled');
        $item->name = $request->input('name');
        $item->body = $request->input('body');
        $item->save();
    }


    public function createContent($request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if($validator->fails()){
            return $validator;
        }
        return $this->create($request->all());
    }

    public function deleteContent($id)
    {
        $this->Destroy($id);
    }


    public function scopeEnabled($query)
    {
        $query->where('enabled', '=', 1);
    }

    public function selectSub($id = 0)
    {
        $list = $this->getListContent();
        $arr = array('0'=>'-Корневой раздел-');
        foreach($list as $row)
        {
            if($row->id!=$id)
                $arr[$row->id]=$row->name;
        }

        return $arr;
    }
}