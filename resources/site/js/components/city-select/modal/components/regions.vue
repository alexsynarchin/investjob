<template>
    <ul class="modal-regions-list">
        <li class="modal-regions-list__item" v-for="(item, index) in regions" @click.prevent="selectRegion(item.id)">
            {{item.name}}
        </li>
    </ul>
</template>
<script>
export default {
    props:['regions'],
    methods: {
        selectRegion(id) {
            this.$emit('select-region',id)
        }
    }
}
</script>
