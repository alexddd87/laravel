@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a href="/admin/contents" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i><span>Добавить</span></a>

            <div class="cm-notification-container">{{ Session::get('message')!='' ? Session::get('message') : "" }}</div>
            <section class="panel">
                <header class="panel-heading">
                    Advanced Table
                </header>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th><i class="fa fa-bullhorn"></i> ID</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Title</th>
                        <th><i class="fa fa-bookmark"></i> url</th>
                        <th><i class=" fa fa-edit"></i> Status</th>
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
                            <td>{{ $row->url }}</td>
                            <td><input type="hidden" value="{{ $row->id }}" name="save_id[]" />
                                <div class="select-popup-container active_status" id="active{{ $row->id }}">
                                    @if($row->active==1)
                                        <span class="label label-success label-mini">Вкл.</span>
                                    @else
                                        <span class="label label-danger label-mini">Выкл</span>
                                    @endif
                                </div>

                            </td>
                            <td width="10%">
                                <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                <a href="/admin/contents/edit/{{ $row->id }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>

@stop
