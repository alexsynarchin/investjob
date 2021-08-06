<template>
    <section>
        <ul class="register-types">
            <li class="register-types__item" v-for="(item, index) in types" :class="{'register-types__item--active': item.value === type}"
                @click.prevent="selectType(item.value)"
            >
                {{item.label}}
            </li>
        </ul>
        <div class="text-center">
            <button class="btn btn-lg button-orange" @click.prevent="$emit('next-step')">
                Продолжить
            </button>
        </div>
    </section>

</template>
<script>
export default {
    props:['type'],
    data() {
        return {
            types:[
                {
                    value:'applicant',
                    label:'Ищу работу'
                },
                {
                    value:'employer',
                    label:'Ищу персонал'
                },
                {
                    value:'learning_center',
                    label:'Я учебный центр'
                },
            ]
        }
    },
    methods: {
        selectType(type) {
            this.$emit('select-type', type);
        },
    }
}
</script>
