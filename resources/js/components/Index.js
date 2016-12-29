import axios from 'axios';
import Crud from '@lassehaslev/vue-crud';
export default {
    mixins: [ Crud ],

    template: `
<div>
    <k-dropzone></k-dropzone>
    <div class="columns is-multiline">
        <div v-for="( item, index ) in items" class="column is-3 is-6-tablet is-4-widescreen">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img :src="item.url" alt="">
                    </figure>
                </div>
                <div class="card-content">

                    <div class="content">
                        <p class="title is-5">{{ item.original_name }}</p>
                    </div>
                </div>
                <div class="level is-mobile">
                    <div class="level-item has-text-centered">
                        <p class="heading">Width</p>
                        <p class="title">{{ item.width }}</p>
                    </div>
                    <div class="level-item has-text-centered">
                        <p class="heading">Height</p>
                        <p class="title">{{ item.height }}</p>
                    </div>
                    <div class="level-item has-text-centered">
                        <p class="heading">Size</p>
                        <p class="title">{{ item.readable_size }}</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="content">
        {{ item.alt }}
                        <br>
                        <small>{{ item.created_at }}</small>
                    </div>
                </div>
            <footer class="card-footer">
                <a :href="item.download" class="card-footer-item">Download</a>
            </footer>
            <footer class="card-footer">
                <a class="card-footer-item" href="">
                    Edit
                </a>

                <a class="card-footer-item" href="">
                    Delete
                </a>
            </footer>
            </div>
        </div>
    </div>
</div>
    `,

    mounted() {
        var self = this;
        axios.get( '/api/images' ).then( function( response ) {
            self.append( response.data.data );
        } );
    }

}
