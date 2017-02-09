<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Заполните форму
            </header>
            <div class="panel-body">
                <div class="form">
                    {!! Form::open(['class' => 'cmxform form-horizontal tasi-form save_or_create_form', 'novalidate'=>"novalidate"]) !!}
                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Название</label>

                            <div class="col-lg-10">
                                <input class="form-control" id="name" name="name" type="text" value="{{ isset($item->name) ? $item->name : '' }}" minlength="2" required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="slug" class="control-label col-lg-2">URL</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="slug" name="url" type="text" value="{{ isset($item->url) ? $item->url : '' }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sub_id" class="control-label col-lg-2">Родительский раздел</label>
                            <div class="col-lg-10">
                                {{ Form::select(
                                    'sub_id',
                                    isset($select) ? $select : [],
                                    isset($item) ? $item->sub_id : 0,
                                    ['id'=>'sub_id','class'=>'form-control m-bot15']
                                ) }}
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="newsletter" class="control-label col-lg-2 col-sm-3">Включить</label>
                            <div class="col-lg-10 col-sm-9">
                                <input type="checkbox" {{ isset($item) && $item->enabled == 1 ? 'checked="checked"' : '' }} data-toggle="switch" name="enabled" value="1" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="body" class="control-label col-lg-2">Описание</label>
                            <div class="col-lg-10 col-sm-9">
                                <textarea class="form-control ckeditor" name="body" rows="6" id="body">{{ isset($item->body) ? $item->body : '' }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                @if(isset($item))
                                    <button class="btn btn-danger save_or_create" type="submit" name="save">Сохранить</button>
                                    <button class="btn btn-danger save_or_create" type="submit" name="save_and_close">Сохранить и закрыть</button>
                                @else
                                    <button class="btn btn-danger save_or_create" type="submit" name="create">Создать</button>
                                    <button class="btn btn-danger save_or_create" type="submit" name="create_and_open">Создать и открыть</button>
                                @endif
                                {!! link_to_route('content.index', 'Отмена', [], ['class' => 'btn btn-default']) !!}
                            </div>
                        </div>
                        <input type="hidden" name="module" value="content" />
                    {!! Form::close() !!}
                </div>
            </div>
        </section>
    </div>
</div>