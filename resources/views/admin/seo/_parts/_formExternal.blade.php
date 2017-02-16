<div id="content_seodata" class="cm-tabs hidden">
    <fieldset>
        <h2 class="subheader"> Seo-данные </h2>
        <div class="form-field">
            <label for="page_page_title">Title:</label>
            <input type="text" class="input-text-large" size="55" name="[seo][title]" value="{{ $title }}" />
        </div>
        <div class="form-field">
            <label for="page_meta_keywords">Keywords:</label>
            <textarea class="input-textarea-long" rows="2" cols="55" name="[seo][keywords]">{{ $keywords }}</textarea>
        </div>
        <div class="form-field">
            <label for="page_meta_descr">Description:</label>
            <textarea class="input-textarea-long" rows="2" cols="55" name="[seo][description]">{{ $description }}</textarea>
        </div>
    </fieldset>
</div>