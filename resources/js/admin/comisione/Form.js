import AppForm from '../app-components/Form/AppForm';

Vue.component('comisione-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                comision_cvm:  '' ,
                comision_descripcion:  '' ,
                comision_monto:  '' ,
                comision_planta:  '' ,
                created_by_admin_user_id:  '' ,
                updated_by_admin_user_id:  '' ,
                
            }
        }
    }

});