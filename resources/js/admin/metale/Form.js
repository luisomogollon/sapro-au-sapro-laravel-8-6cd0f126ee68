import AppForm from '../app-components/Form/AppForm';

Vue.component('metale-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                activated:  false ,
                metal_codigo:  '' ,
                metal_descripcion:  '' ,
                metal_nombre:  '' ,
                metal_simbolo:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});