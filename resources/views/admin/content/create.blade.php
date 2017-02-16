@extends('admin.layouts.default')

@section('content')
    <div class="cm-tabs-content">
        <div class="clear mainbox-title-container">
            <h1 class="mainbox-title">Создание</h1>
        </div>
        <div class="extra-tools">

            <a class="tool-link" href="/admin/{{ $module }}/create">Добавить новый</a>
        </div>
        <div class="mainbox-body">
            @include("admin.{$module}._form")
        </div>
    </div>
@stop