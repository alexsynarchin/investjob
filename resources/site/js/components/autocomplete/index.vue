<template>
    <div class="search-autocomplete">
        <input  v-on:keyup.enter="search" v-on:keyup="getSearchData" v-bind:value="searchquery"
                v-on:input="$emit('change', $event.target.value)"  class="form-control form-control--lg"
                type="text" :placeholder="placeholder"/>
        <div class="search-autocomplete__panel" v-if=" items.length > 0 ">
            <ul class="search-autocomplete__list" v-if="items.length > 0">
                <li class="search-autocomplete__item" v-for="item in items" @click.prevent="autocompleteName(item)">{{item}}"</li>
            </ul>
        </div>
    </div>

</template>
<script>
    export default {
        model: {
            prop: 'searchquery',
            event: 'change'
        },
        props: {
            searchquery: String,
            placeholder:String,
            type:String,
        },
        data() {
            return {
                items:[]
            }
        },
        methods: {
          search() {
            this.$emit('search')
          },
            getSearchData() {
              if(this.searchquery.length > 1) {
                  axios.get('/api/search/autocomplete/' + this.type,{params:{search:this.searchquery}})
                      .then((response) =>{
                         this.items = response.data;
                      })
              }

            },
            autocompleteName(data) {
            this.$emit('selectName', data);
              this.streets = [];
              this.names = [];
            }
        },
    }
</script>
