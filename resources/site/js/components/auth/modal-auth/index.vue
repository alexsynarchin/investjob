<template>
    <div class="modal fade contact_form_modal" id="auth-modal"  tabindex="-1" role="dialog" aria-labelledby="authModal" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document" :class="{'modal-lg':type==='register'}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="closeModal">
                        <svg viewBox="0 0 10 10">
                            <use xlink:href="/assets/site/images/sprites.svg?ver=44#sprite-close"></use>
                        </svg>
                    </button>
                </div>
                <div class="modal-body ">
                    <login v-if="type ==='login' && showModal"></login>
                    <register v-if="type === 'register' && showModal"></register>
                    <social-auth></social-auth>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { bus } from "../bus.js";
import login from "./login";
import register from './register/index';
import socialAuth from '@/components/auth/social-auth.vue'
export default {
    components:{
        login, register, socialAuth
    },
    data() {
        return {
            type:null,
            showModal:false,
        }
    },
    methods:{
        openModal(type) {
            this.type = type;
            this.showModal=true;
            if(this.type) {
                $('#auth-modal').modal('show');
            }
        },
        closeModal() {
            $('#auth-modal').modal('hide');
        }
    },
    mounted() {
        bus.$on('open-modal', this.openModal);
        var myModalEl = document.getElementById('auth-modal');
        let  vm = this;
        myModalEl.addEventListener('hidden.bs.modal', function () {
         vm.showModal =  false;
         console.log(vm.showModal)
        })
    }

}
</script>
