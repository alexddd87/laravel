<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Content;
use App\Http\Controllers\Controller;


class ContentsController extends Controller
{
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
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Content $contentModel)
    {
        return view('admin.'.$this->tb.'.create', array(
            'tb'=>$this->tb,
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
        $contentModel->createContent($request);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $contentModel, $id)
    {
        $row = $contentModel->getContent($id);
        return view('admin.'.$this->tb.'.edit', array(
            'row'=>$row,
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
        $contentModel->saveContent($request, $id);
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
    }
}