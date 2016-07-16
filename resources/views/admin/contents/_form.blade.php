
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Session::get('message')!='' ? Session::get('message') : "" !!}
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Заполните форму
            </header>
            <div class="panel-body">
                <div class="form">
                    @if(isset($item))
                        {!! Form::open(array('method' => 'put', 'class'=>'cmxform form-horizontal tasi-form', 'novalidate'=>"novalidate")) !!}
                    @else
                        {!! Form::open(array('method' => 'post', 'class'=>'cmxform form-horizontal tasi-form', 'novalidate'=>"novalidate")) !!}
                    @endif

                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Название</label>

                            <div class="col-lg-10">
                                <input class="form-control" id="name" name="name" type="text" value="{{ isset($item->name) ? $item->name : '' }}" minlength="2" required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="slug" class="control-label col-lg-2">URL</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="slug" name="slug" type="text" value="{{ isset($item->slug) ? $item->slug : '' }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sub_id" class="control-label col-lg-2">Родительский раздел</label>
                            <div class="col-lg-10">
                                @if(isset($item))
                                    <?php $sub_id=$item->sub_id; ?>
                                @else
                                    <?php $sub_id=0;?>
                                @endif

                                {{ Form::select('sub_id', $select, $sub_id, array('id'=>'sub_id','class'=>'form-control m-bot15')) }}
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="newsletter" class="control-label col-lg-2 col-sm-3">Включить</label>
                            <div class="col-lg-10 col-sm-9">
                                <div class="col-sm-6 text-center">
                                    <input type="checkbox" checked="" data-toggle="switch" />
                                </div>
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
                                    <button class="btn btn-danger" type="submit">Сохранить</button>
                                @else
                                    <button class="btn btn-danger" type="submit">Создать</button>
                                @endif
                                {!! link_to_route('admin-contents', 'Отмена', array(), array('class'=>'btn btn-default')) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </section>
    </div>
</div>