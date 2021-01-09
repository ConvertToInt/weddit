<div class="columns is-centered">
        <div class="column is-half">
            <div class="box has-background-black-ter has-text-grey-lighter">
                <div class="columns">
                    <div class="column is-2">
                            <img style="height:80px; width:100px; border-radius:12%; border:2px solid grey;" src="{{url('/w', [$subweddit->name, $post->id, $post->title, 'thumbnail'])}}"> {{-- if exists then show file, if not show default.jpg (weddit logo) (add to stoarage) --}}
                    </div>
                    <div class="column is-9">
                        <p>
                            <span class="title is-4 has-text-grey-lighter">{{$post->title}}</span>&nbsp
                            <small>Posted by u/{{$post->user->username}}</small> <small>{{$post->created_at->diffForHumans()}}</small> {{-- diffforhumans uses created at to calculate time since creation --}}
                            <br><br>
                            <p class="title is-5 has-text-grey-lighter">{{$post->body}}</p>
                        </p>
                    </div>
                    @if (Auth::user()->id = $post->user_id)
                        <div class="column is-1">
                            <form method ="POST"
                                    action='{{url("/w/{$subweddit->name}/comments/{$post->id}/{$post->title}/edit")}}'  
                                    style="display:inline!Important;">

                                    @csrf
                                    @method('get')

                                    <div class="field">
                                        <div class="control">
                                            <button class="submit delete is-primary">Edit</button>
                                        </div>
                                    </div>
                            </form>    
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>