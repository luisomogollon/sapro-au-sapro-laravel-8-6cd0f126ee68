import AppForm from '../app-components/Form/AppForm';

Vue.component('lingote-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                lingote_peso:  '' ,
                lingote_troquelado_codigo:  '' ,
                salida_id:  '' ,
                presentacion_id:  '' ,
                lingote_estado_id:  '' ,
                updated_by_admin_user_id:  '' ,
                user_id:  '' ,
                lingote_descripcion:  '' ,
                
            }
        }
    }

});