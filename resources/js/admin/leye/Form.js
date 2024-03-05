import AppForm from '../app-components/Form/AppForm';

Vue.component('leye-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                created_by_admin_user_id:  '' ,
                ley_margen:  '' ,
                updated_by_admin_user_id:  '' ,
                
            }
        }
    }

});