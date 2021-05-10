@extends('admin.layouts.app')

@section('title', 'همه پیام ها')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h4><i class="fa fa-ticket">همه پیام ها</i></h4>
            </div>
            <div class="panel panel-body">
                @if($tickets->isEmpty())
                    <p>شما هیچ پیامی ندارید.</p>
                @else

                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <table class="table ticksTable">
                    <thead>
                    <tr>
                        <th>بخش</th>
                        <th>عنوان</th>
                        <th>وضعیت</th>
                        <th>بروزرسانی اخیر</th>
                        <th style="text-align: center" colspan="2">وضعیت پاسخ</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>
                                {{ $ticket->category }}
                            </td>
                            <td>
                                <a href="{{ url('admin/'.$ticket->ticket_code) }}">
                                    {{ $ticket->title }}
                                </a>
                            </td>
                            <td>
                                @if($ticket->status === 'باز')
                                    <span class="label label-success">{{ $ticket->status }}</span>
                                    @else
                                <span class="label label-danger">{{ $ticket->status }}</span>
                                    @endif
                            </td>
                            <td>{{ $ticket->updated_at }}</td>
                            <td>
                                @if($ticket->status === 'باز')
                                    <a href="{{ url('ticket/'.$ticket->id) }}" class="btn btn-primary">پاسخ</a>
                            </td>
                                <td>
                                    <form action="{{ url('close_ticket/'.$ticket->id) }}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control">
                                        <button type="submit" class="btn btn-danger">بستن</button>
                                    </form>
                                    @endif
                            </td>
                        </tr>
                        @endforeach
                         </tbody>
                </table>

                    {{ $tickets->render() }}
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection