<template>
    <section class="city-select">
        <span class="city-select__text">
            Ваш город: Уфа
        </span>
        <a href="" class="city-select__link" @click.prevent="openModal">Я в другом городе</a>
    </section>
</template>
<script>
import { bus } from "../bus"
export default {
    methods:{
        openModal() {
            bus.$emit('open-modal')
        }
    },
    mounted() {

    }
}
</script>
