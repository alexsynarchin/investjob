<template>
  <section>
      <h4 class="auth__title" >
          {{authTitle}}
      </h4>
      <form>
          <div class="form-group mb-3">
          <input autocomplete="tel" name="phone" type="tel"
                 class="form-control"
                 v-phone
                 v-model="form.phone"
                 placeholder="Телефон">
          </div>
          <label class="form-checkbox mb-3">
            <span class="modal__conf-text">
                    Принимаю <a class="landing-questions__link" href="/privacy" target="_blank">пользовательское соглашение.</a>
            </span>
            <input name="conf_policy" v-model="form.conf_agree" type="checkbox" class="form-checkbox__input"  :class="{'is-invalid': errors.has('conf_agree')}">
            <span class="form-checkbox__checkmark"></span> <br>
            <div class="invalid-feedback invalid-feedback--conf_agree" v-text="errors.get('conf_agree')"></div>
          </label>
          <div class="text-center">
                <button class="btn btn-lg button-orange">{{buttonText}}</button>
          </div>

      </form>
  </section>
</template>
<script>
import { Errors } from  '@/components/common/services/errors.js'
    export default {
        props:['type'],
        data() {
            return {
                form:{
                    phone:'',
                    conf_agree:false,
                },
                errors: new Errors(),
            }
        },
        computed: {
            buttonText:function (){
                let text='';
                if(this.type === 'applicant') {
                    text = 'Помогите оформить резюме'
                }
                if(this.type === 'employer') {
                    text = 'Помогите оформить вакансию'
                }
                if(this.type === 'learning_center') {
                    text = 'Помогите зарегистрироваться'
                }
                return text;
            },
            authTitle:function() {
                let title = '';
                if(this.type === 'applicant') {
                    title = 'Составление резюме нашим специалистом'
                }
                if(this.type === 'employer') {
                    title= 'Составление вакансии нашим специалистом'
                }
                if(this.type === 'learning_center') {
                    title = 'Регистрация нашим специалистом'
                }
                return title;
            }
        }
    }
</script>
