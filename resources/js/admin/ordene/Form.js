import AppForm from '../app-components/Form/AppForm';

Vue.component('ordene-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                orden_referencia:  '' ,
                orden_descripcion:  '' ,
                cliente_id:  '' ,
                orden_estado_id:  '' ,
                orden_tipo:  '' ,
                comision_id:  '' ,
                
            }
        }
    }

});