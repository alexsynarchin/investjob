<template>
    <section>
        <ul class="tabs">
            <li class="tabs__link tabs__link--50-wh" :class="{'tabs__link--active':isActive('register')}" @click="setActive('register')">
                Самостоятельно
            </li>
            <li class="tabs__link tabs__link--50-wh" :class="{'tabs__link--active':isActive('callback')}" @click="setActive('callback')">
                Позвоните мне
            </li>
        </ul>
        <callback v-show="activeTab ==='callback'" :type="type"></callback>
        <register-form v-show="activeTab === 'register'" :type="type"></register-form>
    </section>
</template>
<script>
    import callback from "./callback"
    import registerForm from "./form";
    export default {
        props:['type'],
        components:{
            callback, registerForm,
        },
        data() {
            return {
                activeTab:'register'
            }
        },
        methods: {
            isActive(tab) {
                return this.activeTab === tab
            },
            setActive(tab) {
                this.activeTab = tab;
            }
        }
    }
</script>
