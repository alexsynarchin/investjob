<template>
    <div class="container">
        <el-form ref="form" :model="form" label-position="top">
        <el-tabs type="card" v-model="activeTab">
            <el-tab-pane label="Основная информация" name="main">
                <div class="row">
                    <el-form-item prop="name" label="Заголовок"  class="col-md-7" :error="errors.get('name')">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                    <el-form-item label="Опубликован" class="col-md-5"  prop="active" >
                        <el-checkbox v-model="form.active">Опубликован</el-checkbox>
                    </el-form-item>
                </div>
                <div class="row">
                    <el-form-item prop="slug" label="URL"  class="col-md-7" :error="errors.get('slug')">
                        <el-input v-model="form.slug"></el-input>
                    </el-form-item>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <cke-editor :v-model ="form.content.text" v-if="form.content"></cke-editor>
                    </div>
                </div>
            </el-tab-pane>
            <el-tab-pane label="Настройки и SEO" name="config">
                <seo :form = "form.seo" v-if="form.seo"></seo>
            </el-tab-pane>
        </el-tabs>
            <div class="d-flex mt-4">
                <el-button type="primary" @click.prevent = "save">Сохранить</el-button>
                <el-button type="success" @click.prevent = "close">Закрыть</el-button>
            </div>
        </el-form>
    </div>
</template>
<script>
import seo from '@/components/seo/form';
import CkeEditor from "@/components/cke-editor/index"
import { Errors } from  '@/components/common/services/errors.js';
export default {
    components: {
        seo, CkeEditor
    },
    props: {
        formAction: String,
        form: Object,
    },
    data() {
        return {
            activeTab: 'main',
            errors: new Errors(),
        }
    },
    methods: {
        save() {
            axios.post(this.formAction, this.form)
            .then((response) => {
                this.$emit('closeModal')
            })
            .catch((error) =>{

            })
        },
        close() {

        }
    }
}
</script>
