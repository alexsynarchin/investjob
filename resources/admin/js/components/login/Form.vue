<template>

        <el-form :model="loginForm"  ref="loginForm" :rules="rules" >
            <el-form-item  prop="login" :error="errors.get('login')">
                <el-input
                    size="large"
                    placeholder="Введите e-mail"
                    v-model="loginForm.login"
                ></el-input>
            </el-form-item>
            <el-form-item  prop="password" :error="errors.get('password')">
                <el-input
                    size="large"
                    placeholder="Введите пароль"
                    v-model="loginForm.password" show-password
                />
            </el-form-item>
            <el-form-item class="text-center">
                <el-button type="primary" @click.prevent="loginPost()">Войти</el-button>

            </el-form-item>
        </el-form>
</template>
<script>
    import { Errors } from  '@/components/common/services/errors.js';
    export default {
        data() {

            return {
                loginForm:{
                    login: '',
                    password: '',

                },
                rules:{

                },
                errors: new Errors(),
            }
        },
        methods:{
            loginPost() {
                this.errors.clear();
                var _this = this;
                axios.post('/admin/login', _this.loginForm)
                    .then(function (response) {
                       // console.log(response.data)
                        window.location = response.data;
                    })
                    .catch(function (error) {
                        _this.errors.record(error.response.data.errors)
                    })
            }
        }

    }
</script>

