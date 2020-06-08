<template>
  <div class="create-articles">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <!--  -->
            <form class="needs-validation" novalidate>
              <div class="form-row">
                <div class="col-12 mb-3">
                  <label for="validationCustom01">Title</label>
                  <input type="text" class="form-control" id="validationCustom01" v-model="model.title" required />
                  <div class="invalid-feedback">Please provide a valid!</div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-12 mb-3">
                  <label for="validationCustom03">Description</label>
                  <textarea class="form-control" id="validationCustom03" rows="4" v-model="model.description" required />
                  <div class="invalid-feedback">Please provide a valid</div>
                </div>
              </div>
              <button class="btn btn-primary" type="button" @click="validation">To post</button>
            </form>
            <!--  -->
            <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
              <el-form-item label="Activity name" prop="name">
                <el-input v-model="ruleForm.name"></el-input>
              </el-form-item>
              <el-form-item label="Activity form" prop="desc">
                <el-input type="textarea" v-model="ruleForm.desc"></el-input>
              </el-form-item>
              <el-form-item>
                <el-button type="primary" @click="submitForm('ruleForm')">Create</el-button>
                <el-button @click="resetForm('ruleForm')">Reset</el-button>
              </el-form-item>
            </el-form>
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
            },
            //
            ruleForm: {
            name: '',
            region: '',
            date1: '',
            date2: '',
            delivery: false,
            type: [],
            resource: '',
            desc: ''
          },
          rules: {
            name: [
              { required: true, message: 'Please input Activity name', trigger: 'blur' },
              { min: 3, max: 5, message: 'Length should be 3 to 5', trigger: 'blur' }
            ],            
            desc: [
              { required: true, message: 'Please input activity form', trigger: 'blur' }
            ]
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
        },
        submitForm(formName) {
          this.$refs[formName].validate((valid) => {
            if (valid) {
              alert('submit!');
            } else {
              console.log('error submit!!');
              return false;
            }
          });
        },
        resetForm(formName) {
          this.$refs[formName].resetFields();
        }
    }
}
</script>
