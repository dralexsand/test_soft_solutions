<template>
    <div>

        <div class="control-group">

            <label class="control control-checkbox" :for="box_id">
                {{ box_name }}
                <input
                    @change="onCheck()"
                    :class="box_class"
                    :id="box_id"
                    :box_index="box_index"
                    type="checkbox"
                    v-model="box_value"
                />
                <div class="control_indicator"></div>
            </label>

        </div>

    </div>
</template>

<script>

import {mapGetters, mapState, mapActions, mapMutations} from 'vuex'

export default {
    name: 'BoxItem2',
    props: [
        'box_name',
        'box_id',
        'box_class',
        'box_index',
    ],
    data() {
        return {
            box_value: true,
        }
    },
    methods: {
        processFilterItem(value, id) {

            let filters = this.$store.getters['filters/GET_FILTERS_INIT'];

            console.log('processFilterItem, filters');
            console.log(filters);

            let filter_id = id.split('-');
            let entity = filter_id[0];


            // ToDo ? car_models

            //entity = (entity === 'models') ? 'car_models' : entity;

            //let obj_entity = filters[entity];

            /*let el = obj_entity.filter(obj => {
                return obj.id === id;
            });*/

            /*let i = 0;
            let index_array, el_name, el_index, el_value;

            for (let eli of obj_entity) {
                if (eli.id === id) {
                    obj_entity[i].value = value;
                    /!*index_array = i;
                    el_name = eli.name;*!/
                }
                i++;
            }*/

            //this.$store.dispatch('filters/SET_FILTER_ENTITY_APPLY', entity, obj_entity);

            /*let update_el = {
                id,
                name: el_name,
                value
            }*/

            // SET_FILTER_ENTITY_APPLY

            /*obj_entity[index_array] = update_el;
            filters[entity] = obj_entity;

            console.log('processFilterItem, UPDATED filters');
            console.log(filters);

            this.$store.dispatch('filters/SET_FILTER_APPLY', filters);*/

        },
        onCheck() {

            /*console.log('box_name: ' + this.box_name);
            console.log('box_id: ' + this.box_id);
            console.log('box_index: ' + this.box_index);
            console.log('box_value: ' + this.box_value);*/

            let data_filters = this.$store.getters['filters/GET_FILTERS_INIT'];

            let filter_id = (this.box_id).split('-');
            let entity_name = filter_id[0];

            switch (entity_name) {
                case 'brands':
                    data_filters.brands[this.box_index].value = this.box_value;
                    break;
                case 'car_models':
                    data_filters.car_models[this.box_index].value = this.box_value;
                    break;
                case 'colors':
                    data_filters.colors[this.box_index].value = this.box_value;
                    break;
                case 'transmissions':
                    data_filters.transmissions[this.box_index].value = this.box_value;
                    break;
            }

            console.log('DATA FILTERS');
            console.log(data_filters);

            //this.$store.dispatch('filters/SET_FILTER_INIT_APPLY', data_filters);
            //let state = this.$store
            //this.processFilterItem(this.box_value, this.box_id);
        }
    },
    created() {
        //console.log('Component mounted.');
        //this.$store.dispatch('cars/GET_CARS_REQUEST');
    }
}
</script>

<style scoped>

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
