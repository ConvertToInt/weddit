<div class="columns is-centered">
    <div class="column is-half">
        <article class="media">
        <figure class="media-left">
            <p class="image is-64x64">
            <img src="https://bulma.io/images/placeholders/128x128.png">
            </p>
        </figure>
        <div class="media-content">
        <form method ="POST" action='{{url("/w/$subweddit->name/$post->id/$post->title/comment")}}' >
        @csrf
            <div class="field">
            <p class="control">
                <textarea name ="body" class="textarea" placeholder="Add a comment..."></textarea>
            </p>
            </div>
            <nav class="level">
            <div class="level-left">
                <div class="level-item">
                    <input type="submit" class="button is-info" value="Post Comment"></a>
                </div>
            </div>
            </nav>
            <input type="hidden" name="post_id" value="{{ $post->id }}" />
            </form>
        </div>
        </article>
    </div>
</div>