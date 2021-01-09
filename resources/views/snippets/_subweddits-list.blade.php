<div class="box">
    <h1 class="title has-text-centered has-text-weight-bold is-size-4 has-text-grey-lighter mb-6">Following</h1>
    <ul>
        @foreach(auth()->user()->follows() as $subweddit)
            <li>
                <div class="flex items-center text-sm">
                    <img src="{{$subweddit->logo}}">

                    {{$subweddit->name}}
                </div>
            </li>
        @endforeach
    </ul>
</div>