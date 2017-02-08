@extends('layouts.admin.default')

@section('content')
    {!! Breadcrumbs::render('admin-contents-add') !!}
    @include("contents.admin._form")

@stop