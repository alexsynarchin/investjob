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
        }
    }
}
</script>
