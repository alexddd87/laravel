@extends('admin.layouts.default')

@section('content')

    <div class="cm-notification-container">{{ Session::get('message')!='' ? Session::get('message') : "" }}</div>
    <div id="message">dasd</div>
    <div>
        <div class="clear mainbox-title-container">
            <div class="tools-container"><span class="action-add"> <a href="{{ URL::to('admin/'.$tb.'/create') }}">Добавить</a> </span> </div>
            <h1 class="mainbox-title float-left">asd</h1>
        </div>
    </div>
    <div class="mainbox-body">
        <div id="ds_15014" class="clear">

        </div>
        <div id="content_manage_users">
            <form name="userlist_form" method="post" action="">
                <div id="pagination_contents">
                    <div class="items-container multi-level">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table table-fixed hidden-inputs tb_sort">
                            <tr class="noDrop">
                                <th width="20"></th>
                                <th width="20" class="center">
                                    <input type="checkbox" class="check_all2" title="Отметить/снять все" value="Y" name="check_all">
                                </th>
                                <th width="50">ID</th>
                                <th>Название</th>
                                <th>URL</th>
                                <th width="110">Состояние</th>
                                <th width="170" style="text-align:center;">Действие</th>
                            </tr>
                            @foreach($list as $row)

                                <tr id="sort{{ $row->id }}">
                                    <td class="move"></td>
                                    <td class="center"><input type="checkbox" class="check-item" value="{{ $row->id }}" name="id[]" /></td>
                                    <td><span>{{ $row->id }}</span></td>
                                    <td><input type="text" value="{{ $row->name }}" name="name[]" class="input-text"></td>
                                    <td><input type="text" value="{{ $row->url }}" name="url[]" class="input-text"></td>
                                    <td><input type="hidden" value="{{ $row->id }}" name="save_id[]" />
                                        <div class="select-popup-container active_status" id="active{{ $row->id }}">
                                            @if($row->active==1)
                                                <div class="selected-status status-a"><a> Вкл. </a></div>
                                            @else
                                                <div class="selected-status status-d"><a> Выкл. </a></div>
                                            @endif
                                        </div>
                                    </td>
                                    <td width="10%">
                                        <a href="{{ URL::to('admin/'.$tb.'/'.$row->id.'/edit') }}" class="tool-link">Редактировать</a>
                                        &nbsp;&nbsp;|
                                        {!! Form::open(array('url' => 'admin/'.$tb.'/' . $row->id, 'class' => 'pull-right')) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::submit('Delete', array('class' => 'delete_btn')) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                    </div>
                    <div class="table-tools">
                        <a class="check_all" href="javascript:void(0);">Выбрать все</a>|
                        <a class="uncheck_all" href="javascript:void(0);">Снять выделение со всех</a>
                    </div>
                </div>
                <div class="buttons-container buttons-bg">
                    <div class="cm-buttons-placeholder">
                        <div class="float-left">
							<span class="submit-button cm-button-main">
								<input type="submit" value="Сохранить" name="update" class="">
							</span>или
                            <span class="submit-button cm-button-main cm-confirm cm-process-items">
								<input type="submit" value="Удалить выбранные" name="delete" class="cm-process-items">
							</span>
                        </div>
                    </div>
                    <div class="cm-buttons-floating hidden"></div>
                </div>
                <input type="hidden" value="{{ $tb }}" id="action" />
            </form>
        </div>
    </div>
@stop
