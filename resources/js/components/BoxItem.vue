<template>
    <div>

        <div class="form-check">
            <input
                @change="onCheck()"
                v-model="box_value"
                :class="box_class"
                type="checkbox"
                :id="box_id"
            >
            <label class="form-check-label" :for="box_id">
                {{ box_name }}
            </label>
        </div>

    </div>
</template>

<script>

import {mapGetters, mapState, mapActions, mapMutations} from 'vuex'

export default {
    name: 'BoxItem',
    props: [
        'box_name',
        'box_id',
        'box_class',

    ],
    data() {
        return {
            box_value: true,

            fdata: {
                brands: [],
                models: [],
                prices: [],
                years: [],
                transmissions: [],
                colors: [],
            }
        }
    },
    methods: {
        processFilterItem(value, array, action) {
            if (action) {
                array.push(value);
            } else {
                let index = array.indexOf(value);
                if (index > -1) {
                    array.splice(index, 1);
                }
            }
            return array;

        },
        onCheck() {

            console.log('ON CHECK');
            console.log(this.box_id);
            console.log(this.box_value);

            let result;

            switch (this.box_class) {
                case 'b':
                    result = this.processFilterItem(this.box_value, fdata.brands, this.box_id);
                    break;
                case 'm':
                    result = this.processFilterItem(this.box_value, fdata.brands, this.box_id);
                    break;
                /*case 'p':
                    result = this.processFilterItem(this.box_value, fdata.prices, this.box_id);
                    break;*/
                case 'y':
                    result = this.processFilterItem(this.box_value, fdata.years, this.box_id);
                    break;
                case 't':
                    result = this.processFilterItem(this.box_value, fdata.transmissions, this.box_id);
                    break;
                case 'c':
                    result = this.processFilterItem(this.box_value, fdata.colors, this.box_id);
                    break;
            }

            this.$store.dispatch('filters/SET_FILTER_APPLY', result);
        }
    },
    mounted() {
        //console.log('Component mounted.');
        this.$store.dispatch('cars/GET_CARS_REQUEST');
    },
}
</script>
