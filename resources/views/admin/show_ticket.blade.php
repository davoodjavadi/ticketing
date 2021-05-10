@extends('admin.layouts.app')

@section('title', 'جزئیات پیام')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel panel-heading">
            <b> عنوان : </b>{{ $ticket->title }}
            </div>
            <div class="panel panel-body">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif


                <div class="ticket_info">
                    <p><b> درخواست : </b> {{ $ticket->message }} </p>
                    <p><b>بخش : </b>{{ $ticket->category }}</p>
                    <p>
                        @if($ticket->status === 'باز')
                            <b>وضعیت : </b><span class="label label-success">{{ $ticket->status }}</span>
                            @else
                        <b>وضعیت : </b><span class="label label-danger">{{ $ticket->status }}</span>
                            @endif
                    </p>
                    <p><b> ارسال شده در : </b>{{ $ticket->created_at->diffForHumans() }}</p>
                    <p><b>فرستنده :</b>{{ $ticket->user->name }}</p>
                </div>
            </div>
        </div>
        <hr>
        @include('admin.comments_ticket')
        <hr>
         @include('admin.reply_ticket')
    </div>
</div>
@endsection