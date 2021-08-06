<template>
    <div>
    <h5 class="modal-title text-center">Регистрация на сайте</h5>
        <select-type :type="type" v-if="step === 1" @select-type="selectType" @next-step="step++"></select-type>
        <register :type="type" v-if="step === 2"></register>

    </div>
</template>
<script>
import selectType from "./components/select-type";
import register from "./components/register";

export default {
    components:{
        selectType, register,
    },
    data() {
        return {
            step:1,
            type: "applicant",
        }
    },
    methods: {
        selectType(type) {
            this.type = type;
        },
    }
}
</script>
