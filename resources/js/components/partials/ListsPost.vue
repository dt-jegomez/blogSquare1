<template>
    <div class="container scrolls" style="overflow-y: auto; max-height: 60vh;">
        <div class="col-12 mt-5 border-top pt-3" v-for="(data, index) in arrayArticles" :key="index">
            <div>
                <span class="title-article">
                    {{data.title}}
                </span>
            </div>
            <div class="date-publish">
                <span>
                    {{data.publication_date}}
                </span>
            </div>
            <div>
                <p class="description">
                    {{data.description}}
                </p>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                arrayArticles: [],
                arrayArticlesOriginal: []
            }
        },
        mounted() {
            axios('/articles/set-articles').then((res)=>{
                console.log(res);                
            })
            this.loadContent()
        },
        methods:{
            async loadContent(){
                const {data} = await axios('/articles/index')
                this.arrayArticlesOriginal = data 
                this.arrayArticles = data 
            },
            ir(){
                $('.scrolls').animate({
                    scrollTop: 'opx'
                })
                this.loadContent()
            },
            filter(date){
                if (date===null) {
                    this.arrayArticles = this.arrayArticlesOriginal
                    
                }else{
                    this.arrayArticles = this.arrayArticlesOriginal.filter( x => this.moment(x.publication_date).format('YYYY-MM-DD') === this.moment(date).format('YYYY-MM-DD') )
                }
            }
        }
    }
</script>
<style>
::-webkit-scrollbar {
  width: 0px;
}
</style>