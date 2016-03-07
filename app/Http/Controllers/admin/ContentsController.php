<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Content;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class ContentsController extends Controller
{
    private $name = 'Страницы';
    private $tb = 'contents';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Content $contentModel)
    {
        $list = $contentModel->getListContent();
        return view('admin.'.$this->tb.'.index', array(
            'list'=>$list,
            'tb'=>$this->tb,
            'name'=>$this->name,
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Content $contentModel)
    {
        $select = $contentModel->selectSub();
        return view('admin.'.$this->tb.'.create', array(
            'tb'=>$this->tb,
            'select'=>$select,
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Content $contentModel, Request $request)
    {
        $item = $contentModel->createContent($request);

        if( $item instanceof Validator )
        {
            return redirect()->route('admin-contents-edit', ['id' => $item->id])->withErrors($item);
        }
        else{
            Session::flash('message', $this->messageAdmin('Successfully updated Contents!'));
        }
        return redirect()->route('admin-contents-edit', ['id' => $item->id]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $contentModel, $id)
    {
        $select = $contentModel->selectSub($id);

        $item = $contentModel->getContent($id);
        return view('admin.'.$this->tb.'.edit', array(
            'item'=>$item,
            'select'=>$select,
            'tb'=>$this->tb,
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Content $contentModel, Request $request, $id)
    {
        $validator = $contentModel->saveContent($request, $id);//dd($validator instanceof Validator);
        if($validator !== NULL)
        {
            return redirect()->route('admin-contents-edit', ['id' => $id])->withErrors($validator);
        }
        else{
            Session::flash('message', $this->messageAdmin('Successfully updated Contents!'));
        }

        return redirect()->route('admin-contents-edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $contentModel, $id)
    {
        $contentModel->deleteContent($id);
        return redirect()->route('admin-contents');
    }
}