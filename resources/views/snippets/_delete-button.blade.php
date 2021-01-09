<form method ="POST" 
    action='{{url("/w/{$subweddit->id}")}}'>

    @csrf
    @method('delete')
    <button type="submit" class="button is-danger">Delete</button>
</form>