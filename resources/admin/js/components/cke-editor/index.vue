<template>
    <section>
        <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
    </section>
</template>
<script>
    import CKEditor from '@ckeditor/ckeditor5-vue2';
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import '@ckeditor/ckeditor5-build-classic/build/translations/ru';
    export default {
        model: {
            prop: 'text',
            event: 'change'
        },
        props: {
            text: String,
        },
        components: {
            // Use the <ckeditor> component in this view.
            ckeditor: CKEditor.component
        },
        watch: {
            editorData: function (val) {
                console.log(val);
                this.$emit('change',val);
            }
        },
        data() {
            return {
                editor: ClassicEditor,
                editorData:this.text,
                editorConfig: {
                    language: 'ru'
                }
            };
        }
    }
</script>
