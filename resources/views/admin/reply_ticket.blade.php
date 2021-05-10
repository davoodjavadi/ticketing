<div class="panel panel-default">
    <div class="panel-heading">افزودن پاسخ</div>

    <div class="panel-body">
        <div class="comment-form">
            <form action="{{ url('comment') }}" method="post" class="form">
                {!! csrf_field() !!}
                <input type="hidden" value="{{ $ticket->id }}" name="ticket_id">

                <div class="form-group{{ $errors->has('comment') ? 'has-error' : '' }}">
                    <textarea rows="5" id="comment" class="form-control" name="comment"></textarea>
                    @if($errors->has('comment'))
                        <span class="help-block">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                        @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">ارسال پاسخ</button>
                </div>
            </form>
        </div>
    </div>
</div>