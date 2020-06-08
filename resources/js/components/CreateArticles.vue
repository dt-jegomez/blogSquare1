<template>
  <div class="create-articles">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
              <el-form-item label="Title" prop="title">
                <el-input v-model="ruleForm.title" />
              </el-form-item>
              <el-form-item label="Description" prop="description">
                <el-input type="textarea" v-model="ruleForm.description" />
              </el-form-item>
              <el-form-item>
                <el-button type="primary" @click="submitForm('ruleForm')">To post</el-button>
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
          ruleForm: {
              title: null,
              description: null
          },
          rules: {
            title: [
              { required: true, message: 'Please input Activity name', trigger: 'blur' },
              { min: 3, max: 250, message: 'Length should be 3 to 250', trigger: 'blur' }
            ],            
            description: [
              { required: true, message: 'Please input activity form', trigger: 'blur' }
            ]
          }
        };
    },
    mounted(){
    },
    methods:{
        async createArticle(){
            const { data } = await axios.post('/articles/create',this.ruleForm)
            if (data.mensaje) {
              this.$notify.success({
                title: 'Post',
                message: data.mensaje,
                offset: 100
              })
            }
            
            this.resetForm('ruleForm')
        },
        submitForm(formName) {
          this.$refs[formName].validate((valid) => {
            if (valid) {
              this.createArticle()
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
