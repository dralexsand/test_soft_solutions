import axios from 'axios'

const state = () => ({

    filters: [
        'brands',
        'models',
        'prices',
        'transitions',
        'colors',
    ],

    brands: [],
    car_models: [],
    colors: [],
    transmissions: [],

    prices: {},
    years: {},

    // filters_init.brands[]

    filters_init: {
        brands: [],
        car_models: [],
        colors: [],
        transmissions: [],
        prices: [],
        years: [],
        /*prices: {
            min_price: 50,
            max_price: 1000000
        },
        years: {
            min_year: '1960',
            max_year: '2020'
        },*/
    }
})

// getters
const getters = {
    GET_FILTERS(state) {
        /*console.log('GET_FILTERS');
        console.log(state.filters);*/
        state.filters['prices'] = state.prices;
        return state.filters;
    },
    GET_PRICES(state) {
        /*console.log('GET_PRICES');
        console.log(state.prices);*/
        return state.prices;
    },
    GET_FILTERS_INIT(state) {
        /*console.log('GET_FILTERS_INIT');
        console.log(state.filters_init);*/
        return state.filters_init;
    },
    GET_FILTERS_ONLOAD(state) {
        /*console.log('GET_FILTERS_INIT');
        console.log(state.filters_init);*/
        return state.filters_init;
    }

}

// actions
const actions = {
    SET_FILTER_APPLY(context, data) {
        console.log('SET_FILTER_APPLY');
        console.log(data);
        context.commit('SET_FILTERS', data);
    },
    SET_PRICES_APPLY(context, data) {
        context.commit('SET_PRICES', data);
    },
    SET_FILTER_INIT_APPLY(context, data) {
        context.commit('SET_FILTERS_INIT', data);
    },

    SET_FILTER_ENTITY_APPLY(context, params) {

        console.log('--------STORE--------------');
        console.log(params.entity);
        console.log(params.index);
        console.log(params.value);
        console.log(params.state);

        let filters_init_stored = params.state;

        console.log('filters_init_stored: ' + filters_init_stored);

        switch (params.entity) {
            case 'brands':
                filters_init_stored.brands[params.index] = params.value;
                break;
            case 'car_models':
                filters_init_stored.car_models[params.index] = params.value;
                break;
            case 'colors':
                filters_init_stored.colors[params.index] = params.value;
                break;
            case 'transmissions':
                filters_init_stored.transmissions[params.index] = params.value;
                break;
        }

        context.commit('SET_FILTERS_INIT', filters_init_stored);
    },

    SET_FILTER_ENTITY_ID_APPLY(context, data) {
        context.commit('SET_FILTERS_ENTITY_ID', data);
    },

    SET_EXCLUDED_ID_BY_BRAND_APPLY(context, data) {
        context.commit('SET_EXCLUDED_ID_BY_BRAND', data);
    },

    SET_FILTER_ONLOAD_APPLY(context, data) {
        console.log('SET_FILTER_ONLOAD_APPLY');
        console.log(data);
        context.commit('SET_FILTERS_INIT', data);
    },

}

// mutations
const mutations = {
    SET_FILTERS(state, data) {
        return state.filters = data;
    },
    SET_PRICES(state, data) {
        return state.prices = data;
    },
    SET_FILTERS_INIT(state, data) {
        return state.filters_init = data;
    },
    SET_FILTERS_ENTITY_ID(state, data) {
        console.log('SET_FILTERS_ENTITY_ID');
        console.log(data);

        switch (data.entity) {
            case 'brands':
                state.filters_init.brands[data.index] = {
                    id: data.id,
                    name: data.name,
                    value: data.value,
                };
                break;

            case 'car_models':
                state.filters_init.car_models[data.index] = {
                    id: data.id,
                    name: data.name,
                    value: data.value,
                };
                break;

            case 'colors':
                state.filters_init.colors[data.index] = {
                    id: data.id,
                    name: data.name,
                    value: data.value,
                };
                break;

            case 'transmissions':
                state.filters_init.transmissions[data.index] = {
                    id: data.id,
                    name: data.name,
                    value: data.value,
                };
                break;
        }
    },

    SET_EXCLUDED_ID_BY_BRAND(state, data) {
        console.log('SET_EXCLUDED_ID_BY_BRAND');
        console.log(data);

        let count = state.filters_init.car_models.length;
        let needle_brand_id, brand_arr;
        let brand_id;

        for (let i = 0; i < count; i++) {

            brand_id = state.filters_init.car_models[i].brand_id;

            brand_arr = data.id.split('-');
            needle_brand_id = parseInt(brand_arr[1]);

            if(brand_id === needle_brand_id){
                //console.log(state.filters_init.car_models[i].name);
                state.filters_init.car_models[i].value = data.value;
            }
        }

        /*for (let el of data){
            state.filters_init.car_models[data.index] = {
                id: data.id,
                name: data.name,
                value: data.value,
            };
        }*/



    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
