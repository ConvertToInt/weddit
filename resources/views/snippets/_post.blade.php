<a href="{{url("/w/{$post->subweddit->name}/comments/{$post->id}/{$post->title}")}}">
    <div class="box has-background-black-ter mb-3">
        <div class="columns">
            <div class="column is-1">
                <img style="border-radius:100%" src="{{url('/w', [$post->subweddit->name, 'logo'])}}">
            </div>
            <div class="column is-9">
                <p>
                    <span class="has-text-weight-bold is-size-6 has-text-grey-lighter">w/{{$post->subweddit->name}}</span>&nbsp&middot;&nbspPosted by u/{{$post->user->username}}&nbsp{{$post->created_at->diffForHumans()}} {{-- diffforhumans uses created at to calculate time since creation --}}
                </p><br>
                <p class="title is-5 has-text-grey-lighter">{{$post->title}}</p>
            </div>
        </div>
        <div class="columns is-centered">
            <div class="column"></div>
            @if(! $post->img)
                <div class="column is-10">
                    {{$post->body}}
                </div>
            @else
                <div class="column is-10">
                    <img src="{{url('/w', [$post->subweddit->name, $post->id, $post->title, 'img'])}}"> {{-- if exists then show file, if not show default.jpg (weddit logo) (add to stoarage) --}}
                </div>
            @endif
            <div class="column"></div>
        </div>
    </div>
</a>
