<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <!--  -->
            <form class="needs-validation" novalidate>
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="validationCustom01">Title</label>
                  <input type="text" class="form-control" id="validationCustom01" v-model="model.title" required />
                  <div class="invalid-feedback">Please provide a valid!</div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationCustom03">Description</label>
                  <input type="text" class="form-control" id="validationCustom03" v-model="model.description" required />
                  <div class="invalid-feedback">Please provide a valid</div>
                </div>
              </div>
              <button class="btn btn-primary" type="button" @click="validation">Submit</button>
            </form>
            <!--  -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    data() {
        return {
            forms:{},
            model:{
                title:null,
                description: null
            }
        };
    },
    mounted(){
        window.addEventListener('load', ()=> {
            'use strict';
            this.forms = document.getElementsByClassName('needs-validation');
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
        }, false);
        // axios('/articles/other-articles').the((rs)=>{
        //   console.log(rs);
          
        // })
    },
    methods:{
        validation(e){
            var validation = Array.prototype.filter.call(this.forms, (form) => {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                    this.createArticle()
            });
        },
        async createArticle(){
            const res = await axios.post('/articles/create',this.model)
            this.model = {
                title:null,
                description: null
            }
        }
    }
}
</script>
