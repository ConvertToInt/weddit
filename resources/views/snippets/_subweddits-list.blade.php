<div class="box has-background-black-ter has-text-grey-lighter">
    <h1 class="title has-text-centered has-text-weight-bold is-size-4 has-text-grey-lighter mb-6">Subweddits</h1>
    <ul>
        @foreach($subweddits as $subweddit)
            <a href="{{url("/w/{$subweddit->name}")}}">
            <li>
                <div class="columns is-vcentered">
                    <div class="column is-2">
                        <img src="{{url('/w', [$subweddit->name, 'logo'])}}">
                    </div>
                    <div class="column">
                        <h1 class="title is-5 has-text-white-bis">
                            {{ $subweddit->name }}
                        </h1>
                    </div>  
                </div>                
            </li>
            </a>
        @endforeach
    </ul>
</div>



{{-- <div class="box has-background-black-ter has-text-grey-lighter">
    <h1 class="title has-text-centered has-text-weight-bold is-size-4 has-text-grey-lighter mb-6">Following</h1>
    <ul>
        @foreach(auth()->user()->follows as $subweddit)
            <a href="{{url("/w/{$subweddit->name}")}}">
            <li>
                <div class="columns is-vcentered">
                    <div class="column is-2">
                        <img src="{{url('/w', [$subweddit->name, 'logo'])}}">
                    </div>
                    <div class="column">
                        <h1 class="title is-5 has-text-white-bis">
                            {{ $subweddit->name }}
                        </h1>
                    </div>  
                </div>                
            </li>
            </a>
        @endforeach
    </ul>
</div> --}}