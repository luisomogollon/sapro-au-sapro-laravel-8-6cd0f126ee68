import AppForm from '../app-components/Form/AppForm';

Vue.component('viruta-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                created_by_admin_user_id:  '' ,
                updated_by_admin_user_id:  '' ,
                viruta_muestra:  '' ,
                
            }
        }
    }

});