<div class="card">
    <div class="card-image">
        <figure class="image is-4by3">
            <!-- <img src="http://placehold.it/300x225" alt=""> -->
            <img src="{{ $image->url() }}" alt="">
        </figure>
    </div>
    <div class="card-content">

        <div class="content">
            <p class="title is-5">{{ $image->original_name }}</p>
        </div>
    </div>
    <div class="level is-mobile">
        <div class="level-item has-text-centered">
            <p class="heading">Width</p>
            <p class="title">{{ $image->width }}</p>
        </div>
        <div class="level-item has-text-centered">
            <p class="heading">Height</p>
            <p class="title">{{ $image->height }}</p>
        </div>
        <div class="level-item has-text-centered">
            <p class="heading">Size</p>
            <p class="title">{{ $image->readableSize( 0 ) }}</p>
        </div>
    </div>
    <div class="card-content">
        <div class="content">
            {{ $image->alt }}
            <br>
            <small>{{ $image->created_at }}</small>
        </div>
    </div>
<footer class="card-footer">
    <a href="{{ route( 'images.download', $image->id ) }}" class="card-footer-item"
        onclick="event.preventDefault();
        document.getElementById( 'download-form-{{ $image->id }}' ).submit();">Download</a>
    <form id="download-form-{{ $image->id }}" action="{{ route( 'images.download', $image->id ) }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</footer>
<footer class="card-footer">
    <a class="card-footer-item" href="{{ route( 'images.update', $image->id ) }}"
        onclick="event.preventDefault();
        document.querySelector('#edit-form-{{ $image->id }} input[name=image]').click();
        ;">
        Edit
    </a>
    <form id="edit-form-{{ $image->id }}" action="{{ route( 'images.update', $image->id ) }}" method="POST" style="display: none;" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT" />
        <input type="file" name="image"
            onchange="document.querySelector( '#edit-form-{{ $image->id }}' ).submit();" />
    </form>

    <a class="card-footer-item" href="{{ route( 'images.destroy', $image->id ) }}"
        onclick="event.preventDefault();
        document.getElementById('delete-form-{{ $image->id }}').submit();">
        Delete
    </a>
    <form id="delete-form-{{ $image->id }}" action="{{ route( 'images.destroy', $image->id ) }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE" />
    </form>
</footer>
</div>
