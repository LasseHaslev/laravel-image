import { BaseInputItem } from '@lassehaslev/vue-item-input';
import ImagePicker from '@lassehaslev/vue-image-picker';
export default {
    template: `
            <div>
                <div @click="open" 
                    style="
                        padding-bottom: 100%;
                        background-size: contain;
                        background-position: center;
                        background-repeat: no-repeat;
                        background-color: #ccc;
                        cursor: pointer;
                        " :style="{
                            'background-image': value ? 'url(' + value.url + ')' : ''
                        }">
                </div>
                <image-picker :url="url"
                :adaptor="imagesAdaptor"
                @confirm="selectItem"
                ref="imagePicker">
        <k-dropzone @upload="onUpload"></k-dropzone>
        </image-picker>
            </div>
    `,

    mixins: [ BaseInputItem ],

    methods: {
        open() {
            this.$refs.imagePicker.open();
        },
        imagesAdaptor( images ) {
            // return images;
            return images.data;
        },

        onUpload( response ) {
            this.$refs.imagePicker.add( response.data );
        },
    },

    props: {
        url: {
            required: true,
            type: String,
        }
    },


    components: {
        ImagePicker,
    }
}
