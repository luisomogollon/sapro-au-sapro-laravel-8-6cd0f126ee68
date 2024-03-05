import AppForm from '../app-components/Form/AppForm';

Vue.component('banco-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                banco_mineral:  '' ,
                banco_cuenta:  '' ,
                banco_cantidad_disponible:  '' ,
                banco_cantidad_retiros:  '' ,
                banco_cantidad_depositos:  '' ,
                
            }
        }
    }

});