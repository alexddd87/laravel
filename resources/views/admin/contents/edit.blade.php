@extends('admin.layouts.default')

@section('content')
    {!! link_to_route('home', 'Home') !!}
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Advanced Form validations
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="" novalidate="novalidate">
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-2">Название</label>

                                <div class="col-lg-10"><input class=" form-control" id="firstname" name="firstname" type="text" value="{{ $row->name }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-2">URL</label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="lastname" name="lastname" type="text" value="{{ $row->url }}">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="newsletter" class="control-label col-lg-2 col-sm-3">Receive the Newsletter</label>
                                <div class="col-lg-10 col-sm-9">
                                    <div class="switch has-switch"><div class="switch-on switch-animate"><input type="checkbox" checked="" data-toggle="switch"><span class="switch-left">ON</span><label>&nbsp;</label><span class="switch-right">OFF</span></div></div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-2">Описание</label>
                                <div class="col-lg-10 col-sm-9">
                                    <textarea class="form-control ckeditor" name="editor1" rows="6">{{ $row->body }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-danger" type="submit">Save</button>
                                    <button class="btn btn-default" type="button">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

@stop
