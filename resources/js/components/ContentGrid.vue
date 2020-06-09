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
                            <div class="col-12">
                                <List-post />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ListPost from './partials/ListsPost'
    export default {
        components:{
            ListPost
        }
    }
</script>