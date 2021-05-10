@extends('admin.layouts.app')

@section('title', 'مدیریت کاربران')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h4><i class="fa fa-ticket">لیست کاربران</i></h4>
            </div>
            <div class="panel panel-body">
                @if($users->isEmpty())
                    <p>هیچ کاربری وجود ندارد</p>
                @else

                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <table class="table ticksTable">
                    <thead>
                    <tr>
                        <th>نام</th>
                        <th>ایمیل</th>
                        <th>نقش</th>
                        <th>تاریخ عضویت</th>
                        <th style="text-align: center" colspan="2">مدیریت نقش </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                    {{ $user->email }}
                            </td>
                            <td>
                                @if($user->is_admin == '0')
                                    <span class="label label-success">{{ 'کاربر' }}</span>
                                    @else
                                <span class="label label-danger">{{ 'مدیر' }}</span>
                                    @endif
                            </td>
                            <td>{{ $user->created_at }}</td>

                                <td>
                                    <form action="{{ url('') }}" method="post" class="form-inline">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control">

                                        <div class="form-group">

                                                <select id="user" class="form-control" name="user">
                                                    <option value="">
                                                        @if($user->is_admin == '0')
                                                            {{ 'کاربر' }}
                                                        @else
                                                            {{ 'مدیر' }}
                                                        @endif
                                                    </option>

                                                        <option value="">{{ 'user' }}</option>

                                                </select>
                                        </div>
                                        <button type="submit" class="btn btn-info">تغییر</button>
                                    </form>

                            </td>
                        </tr>
                        @endforeach
                         </tbody>
                </table>

                    {{ $users->render() }}
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection