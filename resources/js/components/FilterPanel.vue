<template>
    <div>

        <table
            v-for="(itemsgroup, index_data) in getData"
            :key="index_data"

            class="table table-borderless">
            <thead>
            <tr>
                <th>
                    <h4 class="panel_subheader">{{ index_data }}</h4>
                </th>
            </tr>
            </thead>
            <Divider/>
            <tbody>

            <tr
                v-for="(item, box_index ) in itemsgroup"
                :key="box_index"
            >
                <td>

                    <div class="control-group">

                        <label class="control control-checkbox"
                               :for="item.id">
                            {{ item.name }}
                            <input
                                @change="onChange(item, index_data)"
                                :id="item.id"
                                :box_index="box_index"
                                :brand_id="item.brand_id"
                                type="checkbox"
                                v-model="item.value"
                            />
                            <div class="control_indicator"></div>
                        </label>

                    </div>

                </td>
            </tr>

            <Divider/>

            </tbody>
        </table>


    </div>
</template>
<script>

import Divider from "./Divider";

import {mapState, mapGetters, mapMutations, mapActions} from 'vuex';

export default {
    name: 'FilterPanel',
    components: {
        Divider
    },
    data() {
        return {}
    },
    beforeCreate() {

    },
    created() {
        this.initData();
    },
    computed: {
        getData() {
            console.log('computed');
            let filters = this.$store.getters['filters/GET_FILT'];
            console.log(filters);
            //return filters.brands;
            return filters;
        }
    },
    mounted() {
        //this.getBoxes();
    },
    methods: {
        setDisabled(item, index_data) {
            if (index_data === 'car_models' && item.value === false) {
                return true;
            }
            return false;
        },
        initData() {
            this.$store.dispatch('filters/SET_FILTER_ONLOAD_APPLY');
        },
        getBoxes() {
            console.log('getBoxes() init');
            let boxes = this.$store.getters['filters/GET_FILT'];
            //console.log(boxes);
        },
        onChange(item, index_data) {
            console.log('onChange() init');
            console.log(item.checked);

            console.log(item);
            console.log(index_data);

            if (index_data === 'brands') {
                let id_arr = (item.id).split('-');
                let search_brand_id = id_arr[1];

                let params = {
                    id: search_brand_id,
                    value: item.value
                }

                this.$store.dispatch('filters/EXCLUDED_MODELS_ID_BY_BRAND_APPLY', params);
            }

            // this.$store.getters['filters/GET_FILT'];
            //this.getBoxes();
        }
    }
}
</script>

<style scoped>

.panel_subheader {
    background-color: #5a6268;
    color: lightgoldenrodyellow;
    padding: 5px;
    text-align: center;
}

.control {
    font-family: arial;
    display: block;
    position: relative;
    padding-left: 30px;
    margin-bottom: 5px;
    padding-top: 3px;
    cursor: pointer;
    font-size: 16px;
}

.control input {
    position: absolute;
    z-index: -1;
    opacity: 0;
}

.control_indicator {
    position: absolute;
    top: 2px;
    left: 0;
    height: 20px;
    width: 20px;
    background: #e6e6e6;
    border: 0px solid #000000;
    border-radius: 0px;
}

.control:hover input ~ .control_indicator,
.control input:focus ~ .control_indicator {
    background: #cccccc;
}

.control input:checked ~ .control_indicator {
    background: #2aa1c0;
}

.control:hover input:not([disabled]):checked ~ .control_indicator,
.control input:checked:focus ~ .control_indicator {
    /*background: #0e6647d;*/
    background: #0e6647;
}

.control input:disabled ~ .control_indicator {
    background: #e6e6e6;
    opacity: 0.6;
    pointer-events: none;
}

.control_indicator:after {
    box-sizing: unset;
    content: '';
    position: absolute;
    display: none;
}

.control input:checked ~ .control_indicator:after {
    display: block;
}

.control-checkbox .control_indicator:after {
    left: 8px;
    top: 4px;
    width: 3px;
    height: 8px;
    border: solid #ffffff;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}

.control-checkbox input:disabled ~ .control_indicator:after {
    border-color: #7b7b7b;
}

.control-checkbox .control_indicator::before {
    content: '';
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    width: 4.5rem;
    height: 4.5rem;
    margin-left: -1.3rem;
    margin-top: -1.3rem;
    background: #2aa1c0;
    border-radius: 3rem;
    opacity: 0.6;
    z-index: 99999;
    transform: scale(0);
}

@keyframes s-ripple {
    0% {
        transform: scale(0);
    }
    20% {
        transform: scale(1);
    }
    100% {
        opacity: 0;
        transform: scale(1);
    }
}

@keyframes s-ripple-dup {
    0% {
        transform: scale(0);
    }
    30% {
        transform: scale(1);
    }
    60% {
        transform: scale(1);
    }
    100% {
        opacity: 0;
        transform: scale(1);
    }
}

.control-checkbox input + .control_indicator::before {
    animation: s-ripple 250ms ease-out;
}

.control-checkbox input:checked + .control_indicator::before {
    animation-name: s-ripple-dup;
}

</style>
