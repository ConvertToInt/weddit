<form method ="POST" 
        action='{{url("/w/{$subweddit->name}/follow")}}'  
        style="display:inline!Important;">
        @csrf

        <button type="submit">
            {{ auth()->user()->following($subweddit->id) ? 'Unfollow' : 'Follow'}}
        </button>

        
    </form><br>