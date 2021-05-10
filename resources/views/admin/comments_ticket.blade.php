<div class="comments">
    @foreach($ticket->comment as $comment)
        <div class="panel panel-@if($ticket->user->id === $comment->user_id){{"default"}}@else{{"success"}}@endif">
            <div class="panel panel-heading">
                &nbsp;&nbsp;&nbsp;{{ $comment->user->name }}

                <span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
            </div>

            <div class="panel panel-body">
                {{ $comment->comment }}
            </div>
        </div>
        @endforeach
</div>