import { Dropzone } from '@lassehaslev/vue-dropzone';
export default {
    template: `
        <dropzone @upload="onUpload" @state-change="onStateChanged" url="/api/images" name="image">
            <div class="hero is-pink" :class="{ 'is-gradient': state }" style="cursor:pointer">
                <div class="hero-body has-text-centered"><span class="icon"><i class="fa fa-cloud-upload"></i></span> Drop files here to upload</div>
            </div>
        </dropzone>
    `,

    data() {
        return {
            state: false,
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
