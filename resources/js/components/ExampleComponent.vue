<template>
    <div class="row row-site">
        <div id="sb-site"></div>
        <div id="outer-wrapper" class="index home">
            <div class="row" id="content-wrapper">
                <div id="main-wrapper" class="text-center">
                    <div class="box-title">
                        <div class="px-5 row">
                            <div class="col-12">
                                <h2 class="mb-4"> LATEST POSTS </h2>
                            </div>
                            <div class="col-12 mt-5" v-for="(data, index) in arrayArticles" :key="index">
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
                    </div>
                </div>
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
            }
        }
    }
</script>
