@foreach($comments as $comment)
<div class="display-comment">
    <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <form method="post" action='{{url("/w/$subweddit->name/$post->id/$post->title/reply")}}'>
            @csrf
            <input type="text" name="body" />
            <input type="hidden" name="post_id" value="{{ $post->id }}" />
            <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            <input type="submit" class="btn btn-warning" value="Reply" />
        </form>

        @include('_comments-replies', ['comments' => $comment->replies])
    
   {{--  @if ( $comment->replies )
        @foreach($comment->replies as $rep1)
            &nbsp;&nbsp;&nbsp;&nbsp;{{ $rep1->body }}
            &nbsp;&nbsp;&nbsp;&nbsp;<a href="" id="reply"></a>
            <form method="post" action='{{url("/w/$subweddit->name/$post->id/$post->title/reply")}}'>
            @csrf
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="body" />
            <input type="hidden" name="post_id" value="{{ $post->id }}" />
            <input type="hidden" name="parent_id" value="{{ $rep1->id }}" />
            <input type="submit" class="btn btn-warning" value="Reply" />
            </form>

            @if ( $rep1->replies )
                @foreach($rep1->replies as $rep2)
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $rep2->body }}
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" id="reply"></a>
                <form method="post" action='{{url("/w/$subweddit->name/$post->id/$post->title/reply")}}'>
                @csrf
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="body" />
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                <input type="hidden" name="parent_id" value="{{ $rep2->id }}" />
                <input type="submit" class="btn btn-warning" value="Reply" />
                </form>
                @endforeach
            @endif

        @endforeach
    @endif --}}
    </div>
@endforeach