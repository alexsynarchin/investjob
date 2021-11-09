<template>
    <section>
        <cke-editor v-model="text"></cke-editor>
    </section>
</template>
<script>
import CkeEditor from "@/components/cke-editor/index"
    export default {
        components: {
            CkeEditor
        },
        data() {
            return {
                text:"",
            }
        }
    }
</script>
