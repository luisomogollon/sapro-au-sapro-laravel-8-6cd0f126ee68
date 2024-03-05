import AppForm from '../app-components/Form/AppForm';

Vue.component('cliente-form', {
    mixins: [AppForm],
    props: [
        'presentaciones'
        ,'comisiones'
    ],
    data: function() {
        return {
            form: {
                cliente_correo:  '' ,
                cliente_nombre:  '' ,
                cliente_rif:  '' ,
                cliente_telf:  '' ,
                cliente_tipo:  '' ,
                comision_id:  '' ,
                enabled:  false ,
                presentacion_id:  '' ,
                user_id:  '' ,
                presentaciones : '',
                comisiones : '',
                
            }
        }
    }

});