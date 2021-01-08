<div class="columns is-centered">
        <div class="column is-half">
        <a href="{{url("/w/{$subweddit->name}/comments/{$post->id}/{$post->title}")}}">
            <div class="box has-background-black-ter has-text-grey-lighter">
                <div class="columns">
                    <div class="column is-2">
                        <img style="height:80px; width:100px; border-radius:12%" src="{{url('/w', [$subweddit->name, $post->id, $post->title, 'thumbnail'])}}"> {{-- if exists then show file, if not show default.jpg (weddit logo) (add to stoarage) --}}
                    </div>
                    <div class="column is-9">
                        <p>
                            <small>Posted by u/{{$post->user->username}}</small> <small>{{$post->created_at->diffForHumans()}}</small> {{-- diffforhumans uses created at to calculate time since creation --}}
                            <br>
                            <p class="title is-4 has-text-grey-lighter">{{$post->title}}</p>
                        </p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>