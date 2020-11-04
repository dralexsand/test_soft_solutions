<template>
    <div class="container">

        <h4>{{ this.title }}</h4>

        <b-table class="b-table">
            <b-thead>
                <b-tr>
                    <b-th>ID</b-th>
                    <b-th>Photo</b-th>
                    <b-th>car_created_year</b-th>
                    <b-th>car_number</b-th>
                    <b-th>price_per_day</b-th>
                </b-tr>
            </b-thead>
            <b-tbody>
                <b-tr v-for="item in this.$store.getters['cars/GET_CARS'].data" :key="item.id">

                    <b-tr>ID</b-tr>
                    <b-tr>Photo</b-tr>
                    <b-tr>car_created_year</b-tr>
                    <b-tr>car_number</b-tr>
                    <b-tr>price_per_day</b-tr>

                </b-tr>
            </b-tbody>
        </b-table>

        <div class="row justify-content-center">

            <div>
                {{ this.$store.getters['cars/GET_CARS'].last_page_url }}
            </div>

            <b-list-group class="mt-3">
                <b-list-group-item

                    v-for="car in this.$store.getters['cars/GET_CARS'].data"
                    :value="car.id"
                    :key="car.id"
                >
                    {{ car.id }} : {{ car.photo }} : {{ car.car_created_year }} : {{ car.car_number }}
                </b-list-group-item>
            </b-list-group>

        </div>
    </div>
</template>

<script>

import {mapGetters, mapState, mapActions} from 'vuex'

import TableCarPagination from "./parts/TableCarPagination";

export default {
    name: "ItemCars",
    props: {
        cars: []
    },
    data() {
        return {
            title: 'List cars',
            /*cars: [],
            car: {
                id, photo, brand_id, model_id, car_created_year, car_number,
                color_id, transmission_id, price_per_day,
            },
            car_id: '',
            paginaion: {},
            edit: false,
            loading: true,
            errored: false,*/
        }
    },
    //
    //  created_at, updated_at
    mounted() {
        //console.log('Component mounted.');
        this.$store.dispatch('cars/GET_CARS_REQUEST');
    },

    methods: {
        getCars() {
            let cars = this.$store.getters['cars/GET_CARS'];
            console.log('CARS');
            console.log(cars);
            this.cars = cars.data;
            return cars;
        }
    },

}
</script>
