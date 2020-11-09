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
        prices: {
            min_price: 50,
            max_price: 1000000
        },
        years: {
            min_year: '1960',
            max_year: '2020'
        },
    }
})

// getters
const getters = {
    GET_FILTERS(state) {
        console.log('GET_FILTERS');
        console.log(state.filters);
        state.filters['prices'] = state.prices;
        return state.filters;
    },
    GET_PRICES(state) {
        console.log('GET_PRICES');
        console.log(state.prices);
        return state.prices;
    },
    GET_FILTERS_INIT(state) {
        console.log('GET_FILTERS_INIT');
        console.log(state.filters_init);
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

    SET_FILTER_ENTITY_APPLY(context, entity, data) {

        let state_stored = state;

        switch (entity) {
            case 'brands':
                state_stored.brands = data;
                break;
            case 'car_models':
                state_stored.car_models = data;
                break;
            case 'colors':
                state_stored.colors = data;
                break;
            case 'transmissions':
                state_stored.transmissions = data;
                break;
        }

        context.commit('SET_FILTERS_INIT', state_stored);

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
    /*    SET_FILTERS_ENTITY(state, data) {
            return state.filters_init = data;
        },*/
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
