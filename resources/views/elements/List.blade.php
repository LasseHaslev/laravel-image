<image-list :delete-url="function( item ) { return '/api/images/' + item.id; }"></image-list>
<?php /* ?>
<div class="columns is-mobile is-multiline">
@foreach( $images as $image )
    <div class="column">
@include( 'images::elements.image' )
    </div>
@endforeach
</div>
<?php */ ?>
