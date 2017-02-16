<script>tinymce.init({ selector:'#{{ $name }}' });</script>
<div class="form-field">
    <label for="page_descr">Описание:</label>
    <textarea class="form-control ckeditor" name="{{ $name }}" rows="6" id="{{ $name }}">{{ $value }}</textarea>
</div>