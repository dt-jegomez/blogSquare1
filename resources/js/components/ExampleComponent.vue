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
                            <div class="col-12 mt-5" v-for="data in 5">
                                <div>
                                    <span class="title-article">
                                        A BEAUTIFUL BLOG WITH NO IMAGES REQUIRED
                                    </span>
                                </div>
                                <div class="date-publish">
                                    <span>
                                        21/12/2020
                                    </span>
                                </div>
                                <div>
                                    <p class="description">
                                        Typography is a WordPress theme created for bloggers that just want to write, without the hassle of looking for the right featured image. It has a unique design based on beautiful typography and a modern, clean layout. Simply write your content and publish will handle the rest. Efficiently negotiate enabled partnerships whereas team building channels. Competently visualize cross-platform...
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
