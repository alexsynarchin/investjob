<template>
    <div class="overlay">
        <div class="overlay__inner">
            <div class="overlay__content text-center">
                <span class="spinner"></span>
                <div class="mt-3" style="font-size: 1.1rem; color:#fff">{{text}}</div>
            </div>

        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            text: "Импорт данных тип инфоблока: Вакансии и резюме. Инфоблок: Вакансии",
            timing: null,
        }
    },
    methods: {
        runTiming() {
            // Обязательно очищаем предыдущий таймер.


            // Запускаем новый таймер по смене баннеров.
            this.timing = setInterval(this.import, 5000)
        },
        import() {
            axios.get('/api/import')
            .then((response) => {
                this.text = response.data;
                if (!this.timing) {
                    // а) то необходимо запустить наш таймер.
                    this.runTiming();

                    // б) незамедлительно показать первый баннер.
                }
            })
        }
    },
    mounted() {
        this.import();
    }
}
</script>
