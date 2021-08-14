<template>
    <section>
        <h4 class="auth__title" >
            {{authTitle}}
        </h4>
        <form>
            <div class="form-group mb-3">
                <input class="form-control"
                       type="email" placeholder="Ваш e-mail"
                       v-model="form.email"
                       :class="errors.get('email') ? 'is-invalid':''">
            </div>
            <div class="mb-3">
                <label class="form-checkbox">
                <span class="modal__conf-text">
                        Принимаю <a class="landing-questions__link" href="/privacy" target="_blank">пользовательское соглашение.</a>
                </span>
                        <input name="conf_policy" v-model="form.conf_agree" type="checkbox" class="form-checkbox__input"  :class="{'is-invalid': errors.has('conf_agree')}">
                        <span class="form-checkbox__checkmark"></span> <br>
                        <div class="invalid-feedback invalid-feedback--conf_agree" v-text="errors.get('conf_agree')"></div>
                </label>
            </div>
            <div class="text-center">
                <button class="btn btn-lg button-orange">Зарегистрироваться</button>
            </div>
        </form>
    </section>
</template>
<script>
import { Errors } from  '@/components/common/services/errors.js';
export default {
    components: {
    },
    props:['type'],
    data() {
        return {
            form:{
                email:'',
                type:this.type,
                conf_agree: false,
            },
            errors: new Errors(),
        }
    },
    computed: {
        authTitle:function() {
            let title = '';
            if(this.type === 'applicant') {
                title = 'Регистрация в базе соискателей'
            }
            if(this.type === 'employer') {
                title= 'Регистрация в базе работодателей'
            }
            if(this.type === 'learning-center') {
                title = 'Регистрация в базе учебных центров'
            }
            return title;
        }
    },
    methods: {
        register() {
            axios.post('/register')
            .then((response) => {

            })
        }
    }

}
</script>
