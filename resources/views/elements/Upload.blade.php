<a class="button is-primary" href="{{ route( 'images.store' ) }}"
    onclick="event.preventDefault();
    document.querySelector('#upload-form input[name=image]').click();
    ;">
    Upload image
</a>
<form id="upload-form" action="{{ route( 'images.store' ) }}" method="POST" style="display: none;" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="image"
        onchange="document.querySelector( '#upload-form' ).submit();" />
</form>
