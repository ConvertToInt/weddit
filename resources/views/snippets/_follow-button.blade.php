<form method ="POST"
    action='{{url("/w/{$subweddit->name}/toggleFollow")}}'>
    @csrf

    <button class="button is-primary" type="submit">
        {{ auth()->user()->following($subweddit->id) ? 'Unfollow' : 'Follow'}}
    </button>
</form>