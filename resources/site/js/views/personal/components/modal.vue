<template>
    <div class="modal fade contact_form_modal" id="profile-modal"  tabindex="-1" role="dialog" aria-labelledby="profileModal" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="closeModal">
                        <svg viewBox="0 0 10 10">
                            <use xlink:href="/assets/site/images/sprites.svg?ver=44#sprite-close"></use>
                        </svg>
                    </button>
                </div>
                <div class="modal-body ">

                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
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
    }
</script>
