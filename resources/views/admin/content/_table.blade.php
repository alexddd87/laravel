@foreach($list as $row)
    <tr id="sort{{ $row->id }}">
        <td class="move"></td>
        <td class="center"><input type="checkbox" class="check-item" value="{{ $row->id }}" name="id[]" /></td>
        <td><span>{{ $row->id }}</span></td>
        <td><input type="text" value="{{ $row->name }}" name="name[]" class="input-text"></td>
        <td><input type="text" value="{{ $row->url }}" name="url[]" class="input-text"></td>
        <td>
            <div class="select-popup-container active_status" id="active{{ $row->id }}'">
                @if($row->enabled == 1)
                    <div class="selected-status status-a"><a> Вкл. </a></div>
                @else
                    <div class="selected-status status-d"><a> Выкл. </a></div>
                @endif
            </div>
        </td>
        <td width="10%">
            <input type="hidden" value="{{ $row->id }}" name="save_id[]" />

            <a href="/admin/{{ $module }}/{{ $row->id }}/edit" class="tool-link">Редактировать</a>
            &nbsp;&nbsp;|
            <ul class="cm-tools-list tools-list">
                <li><a href="/admin/{{ $module }}/{{ $row->id }}/edit" class="cm-confirm">Удалить</a></li>
            </ul>
        </td>
    </tr>
@endforeach