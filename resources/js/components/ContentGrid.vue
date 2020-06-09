<template>
  <div class="row row-site">
    <div id="sb-site"></div>
    <div id="outer-wrapper" class="index home">
      <div class="row" id="content-wrapper">
        <div id="main-wrapper" class="text-center">
          <div class="box-title">
            <div class="px-5 row">
              <div class="col-12">
                <h2 class="">LATEST POSTS</h2>
                <div class="d-flex justify-content-end py-2">
                  <div class="block">
                        <el-date-picker v-model="datePiker" type="date" placeholder="Pick a day" :picker-options="pickerOptions" @change="filter" />
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="d">
                      <i class="el-icon-refresh-right ir-arriba" @click="ir" />
                    </div>
                </div>
              </div>
              <div class="col-12">
                <List-post class="list-post" ref="ListPost" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ListPost from "./partials/ListsPost";
export default {
  components: {
    ListPost
  },
  data(){
    return{
      datePiker: null,
      pickerOptions: {
          disabledDate(time) {
            return time.getTime() > Date.now();
          },
          shortcuts: [{
            text: 'Today',
            onClick(picker) {
              picker.$emit('pick', new Date());
            }
          }, {
            text: 'Yesterday',
            onClick(picker) {
              const date = new Date();
              date.setTime(date.getTime() - 3600 * 1000 * 24);
              picker.$emit('pick', date);
            }
          }, {
            text: 'A week ago',
            onClick(picker) {
              const date = new Date();
              date.setTime(date.getTime() - 3600 * 1000 * 24 * 7);
              picker.$emit('pick', date);
            }
          }]
      }
    }
  },
  methods:{
    ir(){
      this.$refs.ListPost.ir()
    },
    filter(date){
      this.$refs.ListPost.filter(date)
    }
  }
};
</script>