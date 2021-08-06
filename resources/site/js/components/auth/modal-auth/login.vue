<template>
    <div>
        <h5 class="modal-title text-center">Вход на сайт</h5>
        <form>
            <div class="form-group mb-3">
                <input name="email" placeholder="Ваш логин" type="text" v-model="form.login" class="form-control"
                       :class="errors.get('login') ? 'is-invalid':''">
                <div class="invalid-feedback" v-text="errors.get('login')"></div>
            </div>
            <div class="form-group mb-3">
                <input name="password" placeholder="Пароль" type="password" v-model="form.password" class="form-control"
                       :class="errors.get('password') ? 'is-invalid':''">
                <div class="invalid-feedback" v-text="errors.get('password')"></div>
            </div>
            <div class="text-center mb-2">
                <button class="btn button-orange btn-lg auth__login-btn" @click.prevent="login">
                    Войти
                </button>
            </div>
            <div class="text-center">
                <button class="btn btn-link">Я забыл пароль</button>
            </div>
        </form>
    </div>
</template>
<script>
import { Errors } from  '@/components/common/services/errors.js'

    export default {
        data() {
            return {
                form : {
                    login:"",
                    password:"",
                },
                errors: new Errors(),
            }
        },
        methods: {
            login() {
                axios.post('/login', this.form)
                .then((response) => {
                    window.location.href=response.data;
                })
                .catch((error) => {
                    this.errors.record(error.response.data.errors);
                })
            }
        }
}
</script>
