<template>
    <div class="modal fade contact_form_modal" id="city-modal"  tabindex="-1" role="dialog" aria-labelledby="authModal" aria-hidden="true">
        <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="closeModal">
                        <svg viewBox="0 0 10 10">
                            <use xlink:href="/assets/site/images/sprites.svg?ver=44#sprite-close"></use>
                        </svg>
                    </button>
                </div>
                <div class="modal-body ">
                    <section class="city-modal__heading mb-3">
                        <h5 class="modal-title city-modal__title">{{title}}</h5>
                        <div class="city-modal__heading-controls">
                            <div class="city-modal__current">
                                <svg viewBox="0 0 24 24">
                                    <use xlink:href="/assets/site/images/sprites.svg?ver=44#sprite-location"></use>
                                </svg>
                                <span class="city-modal__current-label">Текущий город:</span>
                                <span class="city-modal__current-value">{{$root.city.name}}</span>
                            </div>
                            <a href="" class="city-modal__auto">
                                Определить автоматически
                            </a>
                        </div>
                    </section>
                    <div class="mb-3">
                        <autocomplete @selectName="selectCity" :type="'regions'"
                                      :placeholder="'Поиск по названию города'" v-model="city">
                        </autocomplete>
                    </div>
                    <regions :regions="regions" @select-region="selectRegion"></regions>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import autocomplete from "@/components/autocomplete/index.vue"
import regions from "./components/regions";
import { bus } from "../bus";
export default {
    components:{
        autocomplete,regions
    },
    data() {
        return {
            showModal:false,
            current_city:'Уфа',
            regions: [],
            cities:[],
            show_city_list:false,
            city: this.$root.city.name,
            title:"Выберите регион",
        }
    },
    methods: {
        selectCity(city) {
            this.$root.city = city;
            axios.post('/api/regions/select-city/' + city.slug);
            this.closeModal();

        },

        selectRegion(id){

        },
        openModal() {
            this.showModal=true;
            $('#city-modal').modal('show');
        },
        closeModal() {
            $('#city-modal').modal('hide');
                this.city = null;
        },
        getRegions() {
            axios.get('/api/regions-list')
            .then((response) => {
                this.regions = response.data;
            })
        }
    },
    mounted() {
        this.getRegions();
        bus.$on('open-modal', this.openModal);
        var myModalEl = document.getElementById('city-modal');
        let  vm = this;
        myModalEl.addEventListener('hidden.bs.modal', function () {
            vm.showModal =  false;
        })
    }
}
</script>
