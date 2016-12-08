<form action="{{ route( 'images.store' ) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="file" name="image" id="image">
<br>

<input class="button is-primary" type="submit" value="Upload Image" name="submit">
</form>

