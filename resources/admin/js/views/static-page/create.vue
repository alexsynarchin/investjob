<template>
    <section>
        <page-form
            :form="formData"
            formAction="/admin/static-pages/create"
        ></page-form>
    </section>
</template>
<script>
import pageForm from "./components/form"
export default {
    components: {
        pageForm,
    },
    data() {
        return {
            formData: {
                title:'',
                slug:'',
                city_id:null,
                active:true,
                content:{},
                seo:{},
            },

        }
    }
}
</script>
