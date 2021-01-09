@foreach (auth()->user()->timeline as $post)
        @include('snippets._post')
@endforeach