<div class="columns is-centered mt-2">
    <div class="column is-half">
        <div class="box has-background-black-ter has-text-grey-lighter">
            <article class="media">
            <div class="media-content">
            <form method ="POST" action='{{url("/w/$subweddit->name/$post->id/$post->title/comment")}}' >
            @csrf
                <div class="field">
                <p class="control">
                    <textarea name ="body" class="textarea has-background-grey-darker has-text-white-bis" placeholder="Add a comment..."></textarea>
                </p>
                </div>
                <nav class="level">
                <div class="level-left">
                    @auth
                    <div class="level-item">
                        <input type="submit" class="button is-warning" value="Post Comment"></a>
                    </div>
                    @endauth
                    @guest
                    <div class="level-item">
                        <a href="/login"><input class="button is-warning" value="Log in to comment"></a>
                    </div>
                    @endguest
                </div>
                </nav>
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                </form>
            </div>
            </article>
        </div>
    </div>
</div>