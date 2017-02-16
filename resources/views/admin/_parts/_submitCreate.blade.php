<div class="buttons-container cm-toggle-button buttons-bg">
    <div class="cm-buttons-floating">
        <div class="cm-buttons-placeholder">
                <span class="submit-button cm-button-main">
                    <input type="submit" value="Создать" name="create" class="save_or_create" />
                </span>&nbsp;
            <span class="submit-button cm-button-main cm-save-and-close">
                    <input type="submit" value="Создать и открыть" name="create_and_open" class="save_or_create" />
                </span> &nbsp;или&nbsp;&nbsp;
            <a class="underlined tool-link" href="/admin/{{ $module }}">Отменить</a>
        </div>
    </div>
</div>
<input type="hidden" value="{{ $module }}" name="module" />