import axios from 'axios'

const state = () => ({
    cars: [],
})

// getters
const getters = {
    GET_CARS(state) {
        //console.log('GET_CARS');
        //console.log(state.cars);
        return state.cars;
    }
}

// actions
const actions = {
    async GET_CARS_REQUEST(context) {
        await axios
            .get('api/v1/cars')
            .then(response => {
                console.log('STORE');
                console.log(response.data);
                context.commit('SET_CARS', response.data)
            })
            .catch(err => console.log('GET_CARS_REQUEST error', err));
    }

}

// mutations
const mutations = {
    SET_CARS(state, data) {
        return state.cars = data;
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
