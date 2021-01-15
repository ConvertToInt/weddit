<form method ="POST" 
    action='{{url("/w/{$subweddit->name}/delete")}}'>

    @csrf
    @method('delete')
    <button type="submit" class="button is-danger">Delete</button>
</form>