import AppForm from '../app-components/Form/AppForm';

Vue.component('salida-estado-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                salida_estado_nombre:  '' ,
                salida_estado_descripcion:  '' ,
                
            }
        }
    }

});