<template>
    <section class="header-search">
        <el-select v-model="city" placeholder="город">
            <el-option
                v-for="item in cities"
                :key="item.value"
                :label="item.label"
                :value="item.value">
            </el-option>
        </el-select>
        <input type="text" class="form-control" placeholder="Я ищу...">
        <el-select v-model="type" placeholder="">
            <el-option
                v-for="item in types"
                :key="item.value"
                :label="item.label"
                :value="item.value">
            </el-option>
        </el-select>
    </section>
</template>
<script>
export default {
    data() {
        return {
            cities: [{
                value: 1,
                label: 'Уфа'
            }],
            city:1,
            types: [{
                    value:1,
                    label:'Вакансии'
                },
                {
                    value:2,
                    label:'Резюме'
                }],
            type:1,
        }
    }
}
</script>
