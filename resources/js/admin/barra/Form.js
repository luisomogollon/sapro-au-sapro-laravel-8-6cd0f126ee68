import AppForm from '../app-components/Form/AppForm';

Vue.component('barra-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                barra_codigo:  '' ,
                barra_descripcion_operacion:  '' ,
                barra_estado_id:  '' ,
                barra_ley_final:  '' ,
                barra_ley_ingreso:  '' ,
                barra_muestra:  '' ,
                barra_peso_banco:  '' ,
                barra_peso_granalla:  '' ,
                barra_peso_ingreso:  '' ,
                barra_ultimo_peso:  '' ,
                barra_und_masa:  '' ,
                orden_id:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});