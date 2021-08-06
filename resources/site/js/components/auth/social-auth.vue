<template>
    <section class="social-auth">
        <label class="social-auth__label">
            Или войти через:
        </label>
        <ul class="social-auth__list">
            <li class="social-auth__item">
                <a href="" class="social-auth__link" @click.prevent="handleSocialAuth('vkontakte')">
                    <svg viewBox="0 0 40 40">
                        <use xlink:href="/assets/site/images/sprites.svg?ver=34#sprite-sa-vk"></use>
                    </svg>
                </a>
            </li>
            <li class="social-auth__item">
                <a href="" class="social-auth__link" @click.prevent="handleSocialAuth('google')">
                    <svg viewBox="0 0 40 40" >
                        <use xlink:href="/assets/site/images/sprites.svg?ver=34#sprite-sa-google"></use>
                    </svg>
                </a>
            </li>
            <li class="social-auth__item">
                <a href="" class="social-auth__link" @click.prevent="handleSocialAuth('facebook')">
                    <svg viewBox="0 0 40 40" >
                        <use xlink:href="/assets/site/images/sprites.svg?ver=34#sprite-sa-fb"></use>
                    </svg>
                </a>
            </li>
        </ul>
    </section>
</template>
<script>
export default {
    props:['building_id'],
    methods:{
        handleSocialAuth(type) {
            let url = '/api/social-auth/' + type;
            window.location.href = '/api/social-auth/' + type;


        }
    }
}
</script>
