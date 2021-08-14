require('./bootstrap');
require('./script')
import Vue from "vue";
import ElementUI from 'element-ui';
Vue.use(ElementUI);
import lang from 'element-ui/lib/locale/lang/ru-RU'
import locale from 'element-ui/lib/locale'
locale.use(lang);
Vue.component('header-city-select', require('./components/city-select/header/index').default);
Vue.component('modal-city-select', require('./components/city-select/modal/index').default);
Vue.component('header-search',require('./components/header-search/index').default);
Vue.component('header-auth',require('./components/auth/header-auth/index').default);
Vue.component('modal-auth',require('./components/auth/modal-auth/index').default);
Vue.component('personal', require('./views/personal/index').default);
Vue.component('loading', require('./components/fakeLoading').default);

Vue.directive('phone', {
    bind(el) {
        el.oninput = function(e) {
            if (!e.isTrusted) {
                return
            }
            if (this.value[0] === '8') {
                this.value = this.value.replace('8', '+7');
            }
            if (this.value.replace(/[^0-9]+/g, '') === '789') {
                this.value = '79';
            }
            const x = this.value.replace(/\D/g, '').match(/(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/);
            x[1] = '+7';
            this.value = !x[3] ? x[1] + ' (' + x[2] : x[1] + ' (' + x[2] + ') ' + x[3] + (x[4] ? '-' + x[4] : '') + (x[5] ? '-' + x[5] : '')

        }

    }
})
const app = new Vue({
    el: '#app',
    data() {
        return {
            isLoading: true,
            city:window.App.city
        }
    },
    mounted() {
        console.log(window.App.city)
    },
    computed: {
        signedIn() {
            return window.App.signedIn;
        },
        user(){
            return  window.App.user;
        },
    },
});
