@extends('layouts.admin.default')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="buttonPanel">
                <a href="/admin/content/create" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> <span>Добавить новую страницу</span></a>
            </div>
            <div class="cm-notification-container">{{ Session::get('message')!='' ? Session::get('message') : "" }}</div>
            <section class="panel">
                <header class="panel-heading">

                </header>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th width="20"></th>
                        <th width="20"></th>
                        <th><i class="fa fa-bullhorn"></i> ID</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Название</th>
                        <th><i class="fa fa-bookmark"></i> URL</th>
                        <th><i class=" fa fa-edit"></i> Статус</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $row)

                        <tr id="sort{{ $row->id }}">
                            <td class="move"></td>
                            <td class="center"><input type="checkbox" class="check-item" value="{{ $row->id }}" name="id[]" /></td>
                            <td><span>{{ $row->id }}</span></td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->slug }}</td>
                            <td><input type="hidden" value="{{ $row->id }}" name="save_id[]" />
                                <div class="select-popup-container enableStatus" data-id="{{ $row->id }}" data-tb="{{ $tb }}">
                                    @if($row->enabled==1)
                                        <span class="label label-success label-mini">Вкл.</span>
                                    @else
                                        <span class="label label-danger label-mini">Выкл</span>
                                    @endif
                                </div>
                            </td>
                            <td width="10%">
                                <a href="/admin/contents/edit/{{ $row->id }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                {{ Form::open(array('url' => 'admin/'.$tb.'/destroy/' . $row->id, 'class' => 'inline')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
@stop
