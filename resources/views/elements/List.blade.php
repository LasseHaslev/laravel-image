<div class="columns is-mobile is-multiline">
@foreach( $images as $image )
    <div class="column">
@include( 'images::elements.image' )
    </div>
@endforeach
</div>
