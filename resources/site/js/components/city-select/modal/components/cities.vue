<template>
    <ul class="modal-regions-list">
        <li class="modal-regions-list__item" v-for="(item, index) in cities" @click.prevent="selectCity(item)">
            {{item.name}}
        </li>
    </ul>
</template>
<script>
    export default {
        props:["region_id"],
        data() {
            return {
                cities: [],
            }
        },
        methods:{
            async getCities() {
                axios.get('/api/cities-list/' + this.region_id)
                    .then((response) => {
                        this.cities = response.data;
                    })
            },
            selectCity(city) {
                this.$emit('select-city', city);
            }
        },
        mounted() {
            this.getCities();
        }
    }
</script>
