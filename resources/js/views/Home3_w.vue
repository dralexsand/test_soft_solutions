<template>
    <div class="container-fluid">

        <h1>Cars</h1>

        <div v-if="errored" class="alert alert-danger" role="alert">
            No records
        </div>

        <div v-else class="row">

            <div class="col-md-3">

                <table class="table table-borderless">
                    <thead>
                    <th>Filter</th>
                    </thead>
                    <tbody>

                    <tr class="panel_subheader">
                        <td>Brands</td>
                    </tr>

                    <tr v-if="brands.length>0">
                        <td>

                            <!--<div class="control-group">

                                <label class="control control-checkbox"
                                       :for="box_id">
                                    {{ box_name }}
                                    <input

                                        :class="box_class"
                                        :id="box_id"
                                        :box_index="box_index"
                                        :brand_id="brand_id"
                                        type="checkbox"
                                        v-model="box_value"
                                    />
                                    <div class="control_indicator"></div>
                                </label>

                            </div>-->


                            <BoxItem

                                v-for="(brands_item, index_brands) in brands"
                                :key="index_brands"
                                :box_name="brands_item.name"
                                :box_id="brands_item.id"
                                :box_value="brands_item.value"
                                :box_index="index_brands"
                                box_class="b"
                            >
                            </BoxItem>

                        </td>
                    </tr>
                    <Divider/>

                    <tr class="panel_subheader">
                        <td>Models</td>
                    </tr>

                    <tr v-if="car_models.length>0">
                        <td>
                            <BoxItem
                                v-for="(models_item, index_models) in car_models"
                                :key="index_models"
                                :box_name="models_item.name"
                                :box_id="models_item.id"
                                :box_value="models_item.value"
                                :box_index="index_models"
                                :brand_id="models_item.brand_id"
                                box_class="m"
                            >
                            </BoxItem>
                        </td>
                    </tr>
                    <Divider/>

                    <tr class="panel_subheader">
                        <td>Colors</td>
                    </tr>

                    <tr v-if="colors.length>0">
                        <td>
                            <BoxItem
                                v-for="(colors_item, index_colors) in colors"
                                :key="index_colors"
                                :box_name="colors_item.name"
                                :box_id="colors_item.id"
                                :box_value="colors_item.value"
                                :box_index="index_colors"
                                box_class="c"
                            >
                            </BoxItem>
                        </td>
                    </tr>
                    <Divider/>

                    <tr class="panel_subheader">
                        <td>Transmissions</td>
                    </tr>

                    <tr v-if="transmissions.length>0">
                        <td>
                            <BoxItem
                                v-for="(transmissions_item, index_transmissions) in transmissions"
                                :key="index_transmissions"
                                :box_name="transmissions_item.name"
                                :box_id="transmissions_item.id"
                                :box_value="transmissions_item.value"
                                :box_index="index_transmissions"
                                box_class="t"
                            >
                            </BoxItem>
                        </td>
                    </tr>
                    <Divider/>

                    <tr class="panel_subheader">
                        <td>Price range</td>
                    </tr>
                    <tr>
                        <td>
                            <BoxPrice
                                :min_price="prices.min_price"
                                :max_price="prices.max_price"
                            >
                            </BoxPrice>
                        </td>
                    </tr>

                    <Divider/>

                    <tr class="panel_subheader">
                        <td>Years range</td>
                    </tr>
                    <tr>
                        <td>
                            <BoxYears
                                :min_year="years.min_year"
                                :max_year="years.max_year"
                            >
                            </BoxYears>
                        </td>
                    </tr>

                    </tbody>
                </table>


            </div>

            <div class="col-md-9">

                <nav aria-label="Page navigation example">
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
                        <td>{{ post.car_number }}</td>
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

import Divider from "../components/Divider";
import BoxItem from "../components/BoxItem";
import BoxPrice from "../components/BoxPrice";
import BoxYears from "../components/BoxYears";

import {mapState} from 'vuex';

export default {
    props: {},
    components: {
        BoxItem, Divider, BoxPrice, BoxYears
    },
    data: function () {

        this.getFilterPanelInit();
        //this.onChangeState();

        return {
            posts: [],
            post: {
                id: '',
                photo: '',
                car_created_year: '',
                car_number: '',
                price_per_day: '',
            },
            post_id: '',
            pagination: {},
            edit: false,
            loading: true,
            errored: false,

            //filter_data: {},

            brands: [],
            car_models: [], //this.$store.state.filters_init.car_models,
            colors: [],
            transmissions: [],

            /*prices:[],
            years:[],*/

            prices: {
                /*min_price: '',
                max_price: ''*/
            },
            years: {
                /*min_year: '',
                max_year: ''*/
            },

        }
    },
    created() {
        this.getPosts();

    },

    mounted() {
        //this.updatePanel();
        this.onLoad();
    },

    methods: {

        onChangeState() {
            let filt = this.$store.getters['filters/GET_FILT'];

            console.log('FILT');
            console.log(filt);
        },

        onLoad() {
            this.$store.dispatch('filters/SET_FILTER_ONLOAD_APPLY');
        },

        onChangeBoxState() {
            console.log('onChangeBoxState init');
        },
        changeBrandsList() {
            console.log('Brand list is changed');
        },
        updatePanel() {
            console.log('updatePanel() load');
            //let data_filters_update = this.$store.getters['filters/GET_FILTERS_INIT'];

            //this.brands = this.$store.state.filters.brands;

            let data_filters_update = this.$store.getters['filters/GET_FILTERS_INIT'];
            this.brands = data_filters_update.brands;
            this.car_models = data_filters_update.car_models;
            this.colors = data_filters_update.colors;
            this.transmissions = data_filters_update.transmissions;
        },

        postFilter() {

            let data_filter = {
                'brands': [
                    1, 2
                ],
            }

            axios.post(`/api/v1/filter/data`, {
                data_filter
                //body: this.postBody
            })
                .then(response => {
                    console.log('POST RESPONSE');
                    console.log(response);
                })
                .catch(e => {
                    this.errors.push(e)
                })
        },
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

            page_url = page_url || '/api/v1/cars';

            axios
                .get(page_url)
                .then(response => {
                    let posts = response.data.data;
                    this.posts = posts;
                    this.paginateTable(response.data)
                    //console.log(posts);
                })
                .catch(err => {
                    console.log(err);
                    this.errored = true;
                })
                .finally(() => this.loading = false);
        },

        async getFilterPanelInit() {

            await axios.get(`/api/v1/filter/panel_init`)
                .then(response => {
                    let filter_list = response.data.data;

                    console.log(filter_list);

                    this.$store.dispatch('filters/SET_FILTER_INIT_APPLY', filter_list);

                    this.brands = filter_list.brands;
                    this.car_models = filter_list.car_models;
                    this.colors = filter_list.colors;
                    this.transmissions = filter_list.transmissions;

                    this.prices = filter_list.prices;
                    this.years = filter_list.years;

                    //console.log('this.years: ' + this.years.max_year);

                })
                .catch(err => {
                    console.log(err);
                    this.errored = true;
                })
                .finally(() => this.loading = false);
        },

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

.panel_subheader {
    background-color: #5a6268;
    color: lightgoldenrodyellow;
}


</style>
