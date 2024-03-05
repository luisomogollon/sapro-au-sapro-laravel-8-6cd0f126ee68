import AppListing from '../app-components/Listing/AppListing';

Vue.component('salida-listing', {
    mixins: [AppListing],
    data() {
        return {
            showLingotesFilter: false,
            lingotesMultiselect: {},
            colectoresMultiselect: {},
            filters: {
                lingotes: [],
                colectores: [],
            },
        }
    },
    
    watch: {
        showLingotesFilter: function (newVal, oldVal) {
            this.lingotesMultiselect = [];
            this.colectoresMultiselect = [];
        },
        lingotesMultiselect: function(newVal, oldVal) {
            this.filters.lingotes = newVal.map(function(object) { return object['key']; });
            this.filter('lingotes', this.filters.lingotes);
        },

        colectoresMultiselect: function(newVal, oldVal) {
            this.filters.colectores = newVal.map(function(object) { return object['key']; });
            this.filter('lcolectores', this.filters.colectores);
        }
    }
});