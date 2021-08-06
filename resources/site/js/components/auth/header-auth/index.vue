<template>
    <div class="page-header-profile" v-if="$root.signedIn">
        <a href="/kabinet" class="page-header-profile__link">{{$root.user.name}} {{$root.user.surname}}</a>
        <button class="btn btn-link page-header-profile__logout" @click.prevent="logout">
            <svg viewBox="0 0 18 18" class="page-header-profile__icon">
                <use xlink:href="assets/site/images/sprites.svg#sprite-logout"></use>
            </svg>
            Выйти
        </button>
    </div>
    <div class="page-header-auth" v-else>
        <svg viewBox="0 0 10 12" class="page-header-auth__icon">
            <use xlink:href="assets/site/images/sprites.svg#sprite-lock"></use>
        </svg>
        <button class="btn btn-link page-header-auth__link" @click.prevent="openAuthModal('login')">вход</button>
        <span class="page-header-auth__delimeter">|</span>
        <button class="btn btn-link page-header-auth__link" @click.prevent="openAuthModal('register')">регистрация</button>
    </div>
</template>
<script>
    import { bus } from '../bus.js'
    export default {
        components: {

        },
        methods: {
            logout(){
                axios.post('/logout')
                .then((response) => {
                    window.location.href = response.data
                })
            },
            openAuthModal(type) {
                bus.$emit('open-modal', type)
            }
        }

    }
</script>
