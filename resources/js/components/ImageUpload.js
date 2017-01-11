import { Dropzone } from '@lassehaslev/vue-dropzone';
export default {
    template: `
        <dropzone :url="url" name="image" @upload="onUpload" @state-change="onStateChanged">
            <div class="hero is-pink" :class="{ 'is-gradient': dragOver }" style="cursor:pointer">
                <div class="hero-body has-text-centered"><span class="icon"><i class="fa fa-cloud-upload"></i></span> Drop files here to upload</div>
            </div>
        </dropzone>
    `,

    props: {
        url: {
            type: String,
            default: '/api/images',
        }
    },

    data() {
        return {
            dragOver: false,
        }
    },

    methods: {
        onUpload( response, file ) {
            this.$emit( 'upload', response, file );
        },
        onStateChanged( state ) {
            this.state = state;
            this.$emit('state-change', state);
        },
        onError( file ) {
            this.$emit( 'error', file );
        },
    },

    components: {
        Dropzone,
    }
}
