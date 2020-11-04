import axios from 'axios'

const state = () => ({
    filters: [],
    brands: {},
    models: {},
    prices: {},
    transitions: {},
    colors: {},
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
    }
}

// actions
const actions = {
    SET_FILTER_APPLY(context, data) {
        context.commit('SET_FILTERS', data);
    },
    SET_PRICES_APPLY(context, data) {
        context.commit('SET_PRICES', data);
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
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
