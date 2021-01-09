<div class="columns is-centered">
        <div class="column is-half">
            <div class="box has-background-black-ter has-text-grey-lighter">
                <div class="columns">
                    <div class="column is-11">
                        <p>
                            <span class="title is-4 has-text-grey-lighter">{{$post->title}}</span>&nbsp
                            <small>Posted by u/{{$post->user->username}}</small> <small>{{$post->created_at->diffForHumans()}}</small> {{-- diffforhumans uses created at to calculate time since creation --}}
                            <br><br>
                            <p class="subtitle is-6 has-text-grey-lighter">{{$post->body}}</p>
                        </p>
                    </div>
                    @if (Auth::user()->id = $post->user_id or Auth::user()->id = $subweddit->mod_id)
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
                @if( $post->thumbnail)
                    <div class="columns is-centered">
                        <div class="column"></div>
                        <div class="column is-10">
                            <img style=" border-radius:2%; border:2px solid grey;" src="{{url('/w', [$post->subweddit->name, $post->id, $post->title, 'img'])}}"> {{-- if exists then show file, if not show default.jpg (weddit logo) (add to stoarage) --}}
                        </div>
                        <div class="column"></div>
                    </div>
                @endif
                
            </div>
        </div>
    </div>