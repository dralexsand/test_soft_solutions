<template>

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="min_year">Min year</label>
            <input
                @change="onChangeyear()"
                type="text" class="form-control" id="min_year"
                :value="min_year">
        </div>
        <div class="col-md-6 mb-3">
            <label for="max_year">Max year</label>
            <input
                @change="onChangeyear()"
                type="text" class="form-control" id="max_year"
                :value="max_year">
        </div>
    </div>

</template>

<script>

export default {
    name: 'BoxYears',
    props: [
        /*'min_year',
        'max_year',*/

    ],
    data() {
        return {
            min_year: '',
            max_year: ''
        }
    },
    methods: {
        onChangeyear() {

            console.log('CHANGE year');
            console.log(this.min_year);
            console.log(this.max_year);

            /*let year = {
                'min_year': this.min_year,
                'max_year': this.max_year,
            }*/

            //this.$store.dispatch('filters/S', year);
        }
    },
    mounted() {
        /*let year = {
            'min_year': this.min_year,
            'max_year': this.max_year,
        }*/
        //console.log(year);
        //this.$store.dispatch('filters/SET_YEARS_APPLY', year);
    }
}
</script>
