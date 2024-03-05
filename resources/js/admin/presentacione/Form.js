import AppForm from '../app-components/Form/AppForm';

Vue.component('presentacione-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                presentacion_nombre:  '' ,
                presentacion_peso:  '' ,
                created_by_admin_user_id:  '' ,
                updated_by_admin_user_id:  '' ,
                
            }
        }
    }

});