@foreach($comments as $comment)
<div class="display-comment">
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="box has-background-black-ter has-text-grey-lighter">
                <div class="columns">
                    <div class="column is-11">
                        <p>
                            <small>Comment by u/{{$comment->user->username}}</small> <small>{{$comment->created_at->diffForHumans()}}</small> {{-- diffforhumans uses created at to calculate time since creation --}}
                            <br><br>
                            <p class="is-5 has-text-grey-lighter">{{$comment->body}}</p>
                        </p>
                    </div>
                    @if (Auth::user()->id = $comment->user_id or Auth::user()->id = $subweddit->mod_id)
                        <div class="column is-1">
                            <form method ="POST"
                                    action='{{url("/w/{$subweddit->name}/{$post->id}/{$post->title}/{$comment->id}/delete")}}'  
                                    style="display:inline!Important;">

                                    @csrf
                                    @method('delete')

                                    <div class="field">
                                        <div class="control">
                                            <button class="submit delete is-primary">Edit</button>
                                        </div>
                                    </div>
                            </form>  
                        </div>
                    @endif
                </div>

                <div class="columns is-centered">
                    <div class="column is-12">
                        <form method="post" action='{{url("/w/$subweddit->name/$post->id/$post->title/reply")}}'>
                            @csrf

                            <div class="field has-addons">
                                <div class="control is-expanded">
                                    <input class="input is-small" type="text" name="body">
                                </div>
                                <div class="control">
                                    <button class="button is-primary is-small">Reply</button>
                                </div>
                            </div>

                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('snippets._comments-replies', ['comments' => $comment->replies])
</div>

@endforeach