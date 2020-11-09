<template>
    <div>

        <h1>Cars</h1>

        <div v-if="errored" class="alert alert-danger" role="alert">
            No records
        </div>

        <div v-else>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li
                        :class="{disabled: !pagination.prev_page_url}"
                        @click.prevent="getPosts(pagination.prev_page_url)"
                        class="page-item">
                        <a
                            aria-label="Previous"
                            class="page-link"
                            href=""
                        >
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    <li
                        class="page-item disabled">
                        <a class="page-link" href="">
                            Page is {{ pagination.current_page }} of {{ pagination.last_page }}
                        </a>
                    </li>

                    <li
                        :class="{disabled: !pagination.next_page_url}"
                        @click.prevent="getPosts(pagination.next_page_url)"
                        class="page-item">
                        <a
                            aria-label="Next"
                            class="page-link"
                            href=""
                        >
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>


                </ul>
            </nav>

            <table class="table table-striped">

                <div v-if="loading">Loading...</div>

                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">car_created_year</th>
                    <th scope="col">car_number</th>
                    <th scope="col">price_per_day</th>

                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="post in posts" :key="post.id">

                    <td>{{ post.id }}</td>
                    <td>{{ post.photo }}</td>
                    <td>{{ post.car_created_year }}</td>

                    <td>
                        {{ post.brand_name }}
                        {{ post.car_model_name }}
                        {{ post.car_number }}
                        {{ post.transmission_name }}
                        {{ post.color_name }}
                    </td>
                    <td>{{ post.price_per_day }}</td>
                    <td>
                        <button class="btn btn-success">
                            Edit
                        </button>
                        <button class="btn btn-danger">
                            Delete
                        </button>
                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <button
            @click="applyFilter()"
            type="button"
            class="btn btn-primary btn_apply">
            Aplly
        </button>

    </div>
</template>

<script>
export default {
    name: 'PostsPanel1',

    data() {
        return {
            posts: [],
            post: {
                id: '',
                photo: '',
                car_created_year: '',
                car_number: '',
                price_per_day: '',

                brand_name:'',
                car_model_name:'',
                transmission_name:'',
                color_name:'',

            },
            post_id: '',
            pagination: {},
            edit: false,
            loading: true,
            errored: false,
        }
    },
    computed: {},
    created() {
        this.initData();
        this.getPosts();

    },
    methods: {
        paginateTable(response) {
            let pagination = {
                current_page: response.current_page,
                last_page: response.last_page,
                prev_page_url: response.prev_page_url,
                next_page_url: response.next_page_url,

                per_page: response.per_page,
                total: response.total
            }
            this.pagination = pagination;
            //console.log(this.pagination);
        },

        getPosts(page_url) {

            let param_data = this.$store.getters['filters/GET_FILT'];

            /*console.log('param_data');
            console.log(param_data);*/

            page_url = page_url || `api/v1/filter/data`;

            //page_url = page_url || '/api/v1/cars';

            /*axios
                .get(page_url)*/

            axios.post(page_url, {
                param_data
            })
                .then(response => {

                    console.log('RESPONSE');
                    console.log(response);

                    let posts = response.data.data.data;
                    this.posts = posts;
                    this.paginateTable(response.data.data)
                    //console.log(posts);
                })
                .catch(err => {
                    console.log(err);
                    this.errored = true;
                })
                .finally(() => this.loading = false);
        },

        getPostsOriginal(page_url) {

            let params_data = this.$store.getters['filters/GET_FILT'];

            page_url = page_url || `api/v1/filter/data`;

            //page_url = page_url || '/api/v1/cars';

            /*axios
                .get(page_url)*/

            axios.post(page_url, {
                param_data
            })
                .then(response => {
                    let posts = response.data.data.data;
                    this.posts = posts;
                    this.paginateTable(response.data.data)
                    //console.log(posts);
                })
                .catch(err => {
                    console.log(err);
                    this.errored = true;
                })
                .finally(() => this.loading = false);
        },

        initData() {
            this.$store.dispatch('filters/SET_FILTER_ONLOAD_APPLY');
        },

        applyFilter() {

            console.log('applyFilter() init')

            /*console.log('applyFilter() init')
            let params = this.$store.getters['filters/GET_FILT'];
            console.log(params);

            let param_data = params;
            console.log(param_data);*/

            this.getPosts(`api/v1/filter/data`);

            /*axios.post(`api/v1/filter/data`, {
                param_data
            })
                .then(response => {
                    console.log('POST RESPONSE');
                    console.log(response.data.data);

                    let posts = response.data.data.data;
                    this.posts = posts;
                    this.paginateTable(response.data.data)

                })
                .catch(e => {
                    console.log(e);
                })
                .finally(() => this.loading = false);*/

        }
    }

}
</script>

<style scoped>

.btn_apply {
    position: fixed;
    top: 100px;
    left: 10px;
}

</style>
