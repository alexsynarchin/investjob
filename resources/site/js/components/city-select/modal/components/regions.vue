<template>
    <ul class="modal-regions-list">
        <li class="modal-regions-list__item" v-for="(item, index) in regions">
            {{item.name}}
        </li>
    </ul>
</template>
<script>
export default {
    props:['regions']
}
</script>
