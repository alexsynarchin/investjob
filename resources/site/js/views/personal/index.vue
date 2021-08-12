<template>
    <section v-if="!$root.user.profile_type" class="personal__register-type">
        <div class="d-flex justify-content-center mb-3">
            <el-alert
                style="width:auto"
                title="Выберите тип регистрации"
                type="warning"
                description="Для продолжения работы выберите тип регистрации на сайте"
                show-icon>
            </el-alert>
        </div>
        <div class="mb-3">
            <select-type></select-type>
        </div>

    </section>
</template>
<script>
import selectType from "./components/select-type"
export default {
    components: {
        selectType
    },
    data() {
        return {

        }
    }
}
</script>
