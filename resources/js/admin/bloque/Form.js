import AppForm from '../app-components/Form/AppForm';

Vue.component('bloque-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                bloque_estado_id:  '' ,
                bloque_oro_cargado:  '' ,
                bloque_oro_granalla:  '' ,
                bloque_oro_ley:  '' ,
                bloque_oro_ley_real:  '' ,
                bloque_oro_resultado:  '' ,
                bloque_otros_cargado:  '' ,
                bloque_otros_resultado:  '' ,
                bloque_peso:  '' ,
                bloque_plata_cargado:  '' ,
                bloque_plata_resultado:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});