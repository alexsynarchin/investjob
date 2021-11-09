<template>
    <section class="items-list">
        <el-row type="flex" class="mb-3">
            <el-col :span="12">
                <el-button type="success" icon="el-icon-plus" @click.prevent="create">Добавить Страницу</el-button>
            </el-col>
            <el-col :span="12">
                <el-input
                    v-model="filters[0].value"
                    size="large"
                    width="100%"
                    placeholder="Название"/>
            </el-col>
        </el-row>
        <data-tables :data="pages"  :filters="filters">
            <el-table-column
                type="index"
            >
            </el-table-column>
            <el-table-column
                label="Название"
                sortable
            >
                <template slot-scope="scope">
                    <div style="word-break: normal">
                        {{scope.row.name}}
                    </div>
                </template>
            </el-table-column>
            <el-table-column
                label="url"
                sortable

            >
                <template slot-scope="scope">
                    {{scope.row.slug}}
                </template>
            </el-table-column>
            <el-table-column
                label="Город"
                sortable
            >
                <template slot-scope="scope">
                    <div style="word-break: normal">
                        {{scope.row.city.name}}
                    </div>
                </template>
            </el-table-column>
            <el-table-column
                label="Действия"
            >

                <template slot-scope="scope">
                    <el-button
                        size="mini"
                        type="primary"
                        @click="edit(scope.$index, scope.row)">Редактировать</el-button>
                    <el-button
                        size="mini"
                        type="danger"
                        @click="remove(scope.$index, scope.row)">Удалить</el-button>
                </template>
            </el-table-column>
        </data-tables>
        <el-dialog
            :title="modalTitle"
            :fullscreen="true"
            :center="true"
            :visible.sync="modalOpen"
        >
            <create v-if="modalType === 'create' && modalOpen"></create>
            <update v-if="modalType === 'update' && modalOpen"></update>
        </el-dialog>
    </section>
</template>
<script>
import create from "./create";
import update from "./update"
export default {
    components: {
        create, update
    },
    data() {
        return {
            pages:[],
            modalType:'create',
            modalOpen:true,
            filters: [{
                prop: 'name',
                value: ''
            }],
        }
    },
    computed: {
        modalTitle: function () {
            if (this.modalType === 'create') {
                return 'Новая страница';
            }
            if (this.modalType === 'update') {
                return 'Редактировать страницу';
            }
        }
    },
    methods: {
        getPages() {
            axios.get('/admin/static-pages')
                .then((response) => {
                    this.pages = response.data;
                    console.log(response.data)
                })
                .catch((error) => {

                })
        },
        create() {
            this.modalOpen = true;
            this.modalType = 'create';
        },
        edit() {
            this.modalOpen = true;
            this.modalType = 'update';
        },
        remove() {

        },
    },
    mounted() {
        this.getPages();
    }
}
</script>
