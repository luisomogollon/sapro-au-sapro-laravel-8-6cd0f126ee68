import AppForm from '../app-components/Form/AppForm';

Vue.component('salida-form', {
    mixins: [AppForm],
    props:[
        'lingotes'
        ,'colectores'
    ],
    data: function() {
        return {
            form: {
                salida_referencia:  '' ,
                activated:  false ,
                salida_descripcion:  '' ,
                colector_id:  '' ,
                salida_estado_id:  1 ,
                created_by_admin_user_id:  '' ,
                updated_by_admin_user_id:  '' ,
                user_id:  '' ,
                lingotes: '',
                colectores: '',
                
            }
        }
    }

});