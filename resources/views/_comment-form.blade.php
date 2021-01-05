<h4>Add comment</h4>

<form method ="POST" action='{{url("/w/$subweddit->name/$post->id/$post->title/comment")}}' >
    @csrf
    <input type="text" name="body"/>
    <input type="hidden" name="post_id" value="{{ $post->id }}" />
    <input type="submit" value="Post Comment">
</form>