@extends('admin.layouts.default')

@section('content')
    <div>
        <div class="clear mainbox-title-container">
            <div class="tools-container">
                <span class="action-add">
                    <a href="/admin/{{ $module }}/create">Добавить</a>
                </span>
            </div>
            <h1 class="mainbox-title float-left">{{ $moduleName }}</h1>
        </div>
    </div>
    <div class="mainbox-body">
        <div id="content_manage_users">
            <form name="userlist_form" method="post" action="">
                <div id="pagination_contents">
                    <div class="items-container multi-level">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table table-fixed hidden-inputs tb_sort">
                            <tr class="noDrop">
                                <th width="20"></th>
                                <th width="20" class="center">
                                    <input type="checkbox" class="check_all2" title="Отметить/снять все" value="Y" name="check_all" />
                                </th>
                                <th width="50">ID</th>
                                <th>Название</th>
                                <th>URL</th>
                                <th width="110">Состояние</th>
                                <th width="170" style="text-align:center;">Действие</th>
                            </tr>
                            @include("admin.{$module}._table")
                        </table>
                    </div>
                    <div class="table-tools">
                        <a class="check_all" href="javascript:void(0);">Выбрать все</a>|
                        <a class="uncheck_all" href="javascript:void(0);">Снять выделение со всех</a>
                    </div>
                </div>
                <div class="buttons-container cm-toggle-button buttons-bg">
                    <div class="cm-buttons-floating hidden" style="display: block;">
                        <div class="cm-buttons-placeholder">
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
                <input type="hidden" value="{{ $module }}" id="action" />
            </form>
        </div>
    </div>
@stop