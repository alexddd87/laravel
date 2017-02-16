@extends('admin.layouts.default')

@section('content')
    <div class="cm-tabs-content">
        <div class="clear mainbox-title-container">
            <h1 class="mainbox-title">Редактирование каталог:&nbsp;{{ $item->name }}</h1>
        </div>
        <div class="extra-tools">

            <a class="tool-link" href="/admin/{{ $module }}/create">Добавить новый каталог</a>
            <a class="tool-link cm-confirm" href="/admin/{{ $module }}/create">Удалить этот каталог</a>
            <div class="float-right preview-link">
                <a href="/catalog/{{ $item->url }}" title="{{ $item->url }}" class="tool-link" target="_blank">Предпросмотр</a>
            </div>
        </div>
        <div class="mainbox-body">
            @include("admin.{$module}._form")
        </div>
    </div>
@stop