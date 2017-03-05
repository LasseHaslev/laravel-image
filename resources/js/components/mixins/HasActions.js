export default {
	props: {
	    'show-url': {
	        type: Function,
            default: null,
	    },
	    'edit-url': {
	        type: Function,
            default: null,
	    },
	    'delete-url': {
	        type: Function,
            default: null,
	    },
	},

    computed: {
        hasActions() {
            return this.showUrl
                || this.editUrl
                || this.deleteUrl;
        },
    }
}
