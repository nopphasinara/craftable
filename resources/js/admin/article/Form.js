import AppForm from '../app-components/Form/AppForm';

Vue.component('article-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                perex:  '' ,
                published_at:  '' ,
                enabled:  false ,
                
            }
        }
    }

});