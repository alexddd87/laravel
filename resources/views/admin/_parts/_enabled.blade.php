<div class="form-field">
    <label class="cm-required">Состояние:</label>
    <div class="select-field">
        <input type="radio" class="radio" value="1" id="page_data_0_a" name="enabled" {{ $value == 1 ? ' checked="checked"' : '' }}>
        <label for="page_data_0_a">Вкл.</label>
        <input type="radio" class="radio" value="0" id="page_data_0_d" name="enabled" {{ $value == 0 ? ' checked="checked"' : '' }}>
        <label for="page_data_0_d">Выкл.</label>
    </div>
</div>