<div class="tabs cm-j-tabs cm-track">
    <ul>
        <li id="basic" class="cm-js cm-active"><a href="#">Общее</a></li>
        <li id="seodata" class="cm-js"><a href="#">Seo-данные</a></li>
    </ul>
</div>
{!! Form::open(['class' => 'cm-form-highlight cm-check-changes save_or_create_form']) !!}

    <!--start basic-->
    <div id="content_basic" class="cm-tabs">
        <fieldset>
            <h2 class="subheader"> Информация </h2>
            <div class="form-field">
                <label class="cm-required" for="page">Название:</label>
                <input type="text" class="input-text-large main-input" value="{{ isset($item->name) ? $item->name : '' }}" size="55" name="name" />
            </div>
            <div class="form-field">
                <label class="cm-required" for="page">URL:</label>
                <input type="text" class="input-text-large main-input" value="{{ isset($item->url) ? $item->url : '' }}" size="55" name="url" />
            </div>
            <div class="form-field">
                <label class="cm-required" for="page">Раздел:</label>
                {{ Form::select(
                    'sub_id',
                    isset($select) ? $select : [],
                    isset($item) ? $item->sub_id : 0,
                    ['id' => 'sub_id', 'class' => 'form-control m-bot15']
                ) }}
            </div>
            @include("admin._parts._editor", ['name' => 'body', 'value' => isset($item) ? $item->body : ''])
            @include("admin._parts._enabled", ['value' => isset($item) && $item->enabled == 0 ? 0 : 1])
        </fieldset>
    </div>
    <!--end basic-->

    <!--start seodata-->
    @include("admin.seo._parts._formExternal",
    isset($item->seo) ? ['title' => $item->seo->title, 'keywords' => $item->seo->keywords, 'description' => $item->seo->description] :
    ['title' => '', 'keywords' => '', 'description' => ''])
    <!--end seodata-->

    @if(isset($item))
        @include("admin._parts._submitSave")
    @else
        @include("admin._parts._submitCreate")
    @endif

{!! Form::close() !!}