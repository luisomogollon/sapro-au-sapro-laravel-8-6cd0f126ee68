import AppForm from '../app-components/Form/AppForm';

Vue.component('colectore-form', {
    mixins: [AppForm],
    props: [
        'clientes'
    ],
    data: function() {
        return {
            form: {
                colector_nombres:  '' ,
                colector_apellidos:  '' ,
                colector_cedula:  '' ,
                created_by_admin_user_id:  '' ,
                updated_by_admin_user_id:  '' ,
                cliente: '',
                
            },
            mediaCollections: ['cedulas']
        }
    }

});