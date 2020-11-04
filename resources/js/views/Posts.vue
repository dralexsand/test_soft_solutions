<template>
    <div class="container-fluid">

        <h1>Cars</h1>

        <div v-if="errored" class="alert alert-danger" role="alert">
            No records
        </div>

        <div v-else class="row">

            <div class="col-md-3">

                <table class="table">
                    <thead>
                    <th>Filter</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Brands</td>
                    </tr>
                    <tr>
                        <td>

                            <BoxItem
                                box_name="BMW, Germany"
                                box_id="1"
                                box_class="b"
                            >
                            </BoxItem>

                            <BoxItem
                                box_name="Audi, Germany"
                                box_id="7"
                                box_class="b"
                            >
                            </BoxItem>

                            <BoxItem
                                box_name="Wolkswagen, Germany"
                                box_id="11"
                                box_class="b"
                            >
                            </BoxItem>

                        </td>
                    </tr>

                    <Divider/>

                    <tr>
                        <td>

                            <BoxItem
                                box_name="BMW, Germany"
                                box_id="3"
                                box_class="m"
                            >
                            </BoxItem>

                            <BoxItem
                                box_name="Audi, Germany"
                                box_id="5"
                                box_class="m"
                            >
                            </BoxItem>

                            <BoxItem
                                box_name="Wolkswagen, Germany"
                                box_id="7"
                                box_class="m"
                            >
                            </BoxItem>

                        </td>
                    </tr>

                    <Divider/>

                    <tr>
                        <td>

                            <BoxPrice
                                min_price="50"
                                max_price="10000000"
                            >
                            </BoxPrice>

                        </td>
                    </tr>

                    <Divider/>

                    <tr>
                        <td>

                            <BoxItem
                                box_name="Manual"
                                box_id="1"
                                box_class="t"
                            >
                            </BoxItem>

                            <BoxItem
                                box_name="Automatic"
                                box_id="2"
                                box_class="t"
                            >
                            </BoxItem>

                        </td>
                    </tr>

                    <Divider/>

                    <tr>
                        <td>

                            <BoxItem
                                v-for="color in filter_list_item.colors"
                                box_name="color.name"
                                box_id="color.id"
                                box_class="c"
                            >
                            </BoxItem>

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

export default {
    props: {
        box: {
            box_class: 'default_class',
            box_id: 'default_id',
            box_description: 'Default description',
        },
        checkboxes_list: {
            checkbox_id: 'germany',
            checkbox_class: 'germany_bmw',
            checkbox_description: 'BMW - auto from Germany',
        }
    },
    components: {
        BoxItem, Divider, BoxPrice
    },
    data: function () {
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

            filter_data: {},

            fdata: {
                brands: [],
                models: [],
            },

            filter_list: [],
            filter_list_item: {
                colors: []
            },
            /*colorItem: {
                id: '',
                name: ''
            }*/


        }
    },
    mounted() {
        this.getFilterPanel();
        this.getPosts();
    },
    methods: {
        getFilterPanel() {
            axios
                .get('/api/v1/list_filters')
                .then(response => {
                    let filter_list = response.data;
                    this.filter_list = filter_list;
                    console.log('FILTER_LIST');
                    console.log(filter_list);

                    this.filter_list_item.colors = filter_list.colors;
                    console.log('FILTER_LIST_COLORS');
                    console.log(filter_list.colors);

                })
                .catch(err => {
                    console.log(err);
                    this.errored = true;
                })
                .finally(() => this.loading = false);

        },


        applyFilter() {
            let boxes = this.$store.getters['filters/GET_FILTERS'];
            console.log('STATE FILTERS');
            console.log(boxes);
            this.postFilter();
        },

        postFilter() {

            let postBody = {
                'models': [
                    'Camry', 'Crown'
                ],
                'brands': [
                    'Porshe'
                ],
            }

            axios.post(`/api/v1/filters`, {
                body: postBody
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
        }
        ,
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
        }
        ,
    }
}
</script>
<style>
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
