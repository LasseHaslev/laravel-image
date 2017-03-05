import { Dropzone } from '@lassehaslev/vue-dropzone';
import ImagePicker from '@lassehaslev/vue-image-picker';
console.log(ImagePicker);
export default {
    template: `
    <div>
        <div style="padding-bottom: 100%"
            @click="open"
            :style="{
                'background-image': selectedImage ? 'url(' + selectedImage.url + ')' : '',
                'background-size':'contain',
                'background-position':'center',
                'background-repeat': 'no-repeat',
                'background-color': '#ccc',
                'cursor':'pointer',
            }"></div>

            <input type="hidden" :name="name" :value="selectedImage ? selectedImage.id : ''">

        <div class="has-text-centered">
            <a @click.prevent="selectImage(null)" class="button is-fullwidth is-warning" href="#">Remove image</a>
        </div>
        <image-picker :url="url"
        :adaptor="imagesAdaptor"
        :selected="selectedImage"
        @confirm="selectImage"
        ref="imagePicker">
            <dropzone :url="uploadUrl ? uploadUrl : url" @upload="onUpload" @state-change="onStateChanged" name="image">
                <div class="hero" :class="[ isHover ? 'is-warning' : 'is-info' ]">
                    <div class="hero-body has-text-centered"><span class="icon"><i class="fa fa-cloud-upload"></i></span> Drop files here to upload</div>
                </div>
            </dropzone>
        </image-picker>
    </div>
    `,

    props: {
        url: {
            type: String,
            default: '',
        },
        name: {
            type: String,
            default: 'image',
        },
        values: {
            default: null,
        },
        'upload-url': {
            type: 'string',
            default: null,
        }
    },

    mounted() {
        this.selectedImage = this.values;
    },

    data() {
        return{

            selectedImage: null,

            isHover: false,

        }
    },

    methods: {
        open() {
            this.$refs.imagePicker.open();
        },
        imagesAdaptor( images ) {
            return images.data;
        },
        selectImage( image ) {
            this.selectedImage = image;
        },

        onStateChanged( state ) {
            this.isHover = state;
        },
        onUpload( response ) {
            this.$refs.imagePicker.uploaded( response.data );
        },
    },

    components: {
        ImagePicker,
        Dropzone,
    }
}
