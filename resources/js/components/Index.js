import axios from 'axios';
import Crud from '@lassehaslev/vue-crud';
import HasActions from '../../../../../../resources/assets/js/components/CRUD/mixins/HasActions';
export default {
    mixins: [ Crud, HasActions ],

    template: `
<div>
    <k-dropzone @upload="onUpload"></k-dropzone>
    <div class="columns is-multiline">
        <div v-for="( item, index ) in items" class="column is-6-tablet is-4-desktop is-3-widescreen">
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
            <footer v-if="false" class="card-footer">
                <a @click.prevent="download( item )" :href="item.download_url" class="card-footer-item">Download</a>
            </footer>
            <footer class="card-footer">

                <delete v-if="deleteUrl" :url="deleteUrl( item )" @delete="onRemove( index )">
                    <a @click.prevent class="card-footer-item" :href="deleteUrl( item )">
                        Delete
                    </a>
                </delete>
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
    },

    methods: {
        onUpload( response ) {
            this.prepend( response.data.data );
            console.log('Upload');
            console.log(response);
        },
        download( item ) {
            console.log(item);
            axios.post( item.download_url, { responseType: 'blob' } ).then( function( response ) {
                console.log(response);
                download( response, item.original_name, item.mime_type );
            } ).catch( function( error ) {
                
            } );
        },
        onRemove( index ) {
            this.remove( index );
            Notifications.notify({
                'message': 'Item successfully deleted.',
                'type': 'success',
            });
        },
        onRemoveError( response ) {
            Notifications.notify({
                'message': response.statusText + ': ' + response.body,
                'type': 'danger',
                'important': true,
            });
        },
    },

}
