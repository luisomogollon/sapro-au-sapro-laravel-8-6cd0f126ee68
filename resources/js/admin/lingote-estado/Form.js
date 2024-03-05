import AppForm from '../app-components/Form/AppForm';

Vue.component('lingote-estado-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                lingote_estado_nombre:  '' ,
                lingote_estado_descripcion:  '' ,
                
            }
        }
    }

});