import AppForm from '../app-components/Form/AppForm';

Vue.component('movimiento-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                activated:  false ,
                banco_id:  '' ,
                barra_id:  '' ,
                movimiento_cifra:  '' ,
                movimiento_codigo:  '' ,
                movimiento_tipo:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});