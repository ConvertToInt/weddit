---------------------------------------
<form method ="POST" action='' enctype ="multipart/form-data">
    @csrf
    <input type="file" name="thumbnail"><br>
    <input type="text" name="title">Title<br>
    <textarea name="body"></textarea>Body<br>
    <input type="submit" value="Save Upload">
</form>
-------------------------------------