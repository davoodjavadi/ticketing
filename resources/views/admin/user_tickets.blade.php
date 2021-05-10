@extends('admin.layouts.app')

@section('title', 'پیام های من')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel panel-heading">
            <i class="fa fa-ticket">پیام های من</i>
            </div>
            <div class="panel panel-body">
                @if($tickets->isEmpty())
                    <p>شما هیچ پیامی ندارید.</p>
                @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>بخش</th>
                        <th>عنوان</th>
                        <th>استتوس</th>
                        <th>بروزرسانی اخیر</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>
                                {{ $ticket->category }}
                            </td>
                            <td>
                                <a href="{{ url('admin').'/'.$ticket->ticket_code }}">
                                    {{ $ticket->title }}
                                </a>
                            </td>
                            <td>
                                @if($ticket->status  ===  'باز')
                                    <span class="label label-success">{{ $ticket->status }}</span>
                                    @else
                                <span class="label label-danger">{{ $ticket->status }}</span>
                                    @endif
                            </td>
                            <td>{{ $ticket->updated_at }}</td>
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