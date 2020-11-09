<template>
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-3">

                <FilterPanel></FilterPanel>

            </div>

            <div class="col-md-9">

                <PostsPanel>

                </PostsPanel>

            </div>
        </div>



    </div>
</template>

<script>

import PostsPanel from "../components/PostsPanel";
import FilterPanel from "../components/FilterPanel";

export default {
    props: {},
    components: {
        PostsPanel, FilterPanel
    },
    data: function () {

        return {}
    },
    created() {

    },

    mounted() {

    },

    methods: {
        /*applyFilter() {
            console.log('applyFilter() init')
            let params = this.$store.getters['filters/GET_FILT'];
            console.log(params);
        }*/
    }
}
</script>

<style scoped>
.btn_apply {
    position: fixed;
    top: 100px;
    left: 10px;
}

.btn_get_state {
    position: fixed;
    top: 200px;
    left: 10px;
}




</style>
