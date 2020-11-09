import axios from 'axios'

const state = () => ({

    filt: {}

})

// getters
const getters = {
    GET_FILT(state) {
        /*console.log('GET_filt');
        console.log(state.filt);*/
        console.log('GET_FILT');
        return state.filt;
    },

}

// actions
const actions = {
    async SET_FILTER_ONLOAD_APPLY(context) {
        console.log('SET_FILTER_ONLOAD_APPLY');

        await axios
            .get('/api/v1/filter/panel_init')
            .then(response => {
                let data = response.data.data;
                //console.log(data);
                context.commit('SET_FILT', data);

            })
            .catch(err => {
                console.log(err);
                this.errored = true;
            })
            .finally(() => console.log('SET_FILTER_ONLOAD_APPLY complete'));
    },

    EXCLUDED_MODELS_ID_BY_BRAND_APPLY(context, data) {
        context.commit('EXCLUDED_MODELS_ID_BY_BRAND', data);
    },

}

// mutations
const mutations = {
    SET_FILT(state, payload) {
        return state.filt = payload;
    },

    EXCLUDED_MODELS_ID_BY_BRAND(state, data) {
        //console.log('EXCLUDED_MODELS_ID_BY_BRAND');
        //console.log(data);

        let count = state.filt.car_models.length;
        let needle_brand_id, brand_arr;
        let brand_id;

        for (let i = 0; i < count; i++) {

            brand_id = state.filt.car_models[i].brand_id;
            needle_brand_id = parseInt(data.id);

            if(brand_id === needle_brand_id){
                //console.log(state.filt.car_models[i].name);
                state.filt.car_models[i].value = data.value;
            }
        }
        //return state.filt;
    },




}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
