import { Dropzone } from '@lassehaslev/vue-dropzone';
export default {
    template: `
        <dropzone url="/api/images" name="image">
            <div class="hero is-pink is-gradient" style="cursor:pointer">
                <div class="hero-body has-text-centered"><span class="icon"><i class="fa fa-cloud-upload"></i></span> Drop files here to upload</div>
            </div>
        </dropzone>
    `,
    components: {
        Dropzone,
    }
}
