@extends('admin.layouts.default')

@section('content')
    {!! Breadcrumbs::render('admin-contents-add') !!}
    @include("admin.contents._form")

@stop