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
                arrayArticles: []
            }
        },

        mounted() {
            this.loadContent()
        },
        methods:{
            async loadContent(){
                const {data} = await axios('/articles/index')
                this.arrayArticles = data 
            },
            ir(){
                $('.scrolls').animate({
                    scrollTop: 'opx'
                })
                this.loadContent()
            }
        }
    }
</script>
<style>
::-webkit-scrollbar {
  width: 0px;
}
</style>