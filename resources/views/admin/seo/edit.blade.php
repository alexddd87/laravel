@extends('admin.layouts.default')

@section('content')
    {!! Breadcrumbs::render('admin-contents-edit') !!}
    <div class="buttonPanel">
        <div class="pull-left">
            <a href="/admin/contents/create" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> <span>Добавить новую страницу</span></a>
        </div>
        <div class="pull-left">
            {{ Form::open(array('url' => 'admin/'.$tb.'/destroy/' . $item->id)) }}
            {{ Form::hidden('_method', 'DELETE') }}
            <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> <span>Удалить эту страницу</span></button>
            {{ Form::close() }}
        </div>
        <div class="clear"></div>
    </div>

    @include("admin.{$moduleName}._form")

@stop