@extends('admin.layouts.app')

@section('title', 'پیام جدید')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel panel-heading">
            <i class="fa fa-ticket">ارسال پیام جدید</i>
            </div>
            <div class="panel panel-body">
                   @if(session('status'))
                       <div class="alert alert-success">
                           {{ session('status') }}
                       </div>
                       @endif
                <form class="form-horizontal" method="post" role="form" action="{{ url('new-ticket/store') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control">
                    <div class="form-group {{ $errors->has('title') ? 'has-error':'' }}">

                        <div class="col-md-8">
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @if($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                        </div>
                        <label for="title" class="col-md-2 control-label">موضوع</label>
                    </div>



                    <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">

                        <div class="col-md-8">
                            <select id="category" class="form-control" name="category">
                                <option value="">بخش مورد نظر</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                            </select>

                            @if($errors->has('category'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                                @endif
                        </div>
                        <label for="category" class="col-md-2 control-label">بخش</label>
                    </div>

                    <div class="form-group {{ $errors->has('priority') ? 'has-error' : '' }}">



                        <div class="col-md-8">
                            <select id="priority" class="form-control" name="priority">
                                <option value="">سطح اولویت</option>
                                <option value="کم">کم</option>
                                <option value="متوسط">متوسط</option>
                                <option value="زیاد">زیاد</option>
                            </select>

                            @if($errors->has('priority'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('priority') }}</strong>
                                </span>
                                @endif
                        </div>
                        <label for="priority" class="col-md-2 control-label">اولویت</label>
                    </div>




                    <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">

                        <div class="col-md-8">
                            <textarea rows="10" id="message" class="form-control" name="message"></textarea>
                            @if($errors->has('message'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                                @endif
                        </div>
                        <label for="message" class="col-md-2 control-label">پیام</label>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-ticket"></i>ارسال
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection