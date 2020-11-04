<template>

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="min_price">Min price</label>
            <input
                @change="onChangePrice()"
                type="text" class="form-control" id="min_price"
                v-model="min_price">
        </div>
        <div class="col-md-6 mb-3">
            <label for="max_price">Max price</label>
            <input
                @change="onChangePrice()"
                type="text" class="form-control" id="max_price"
                v-model="max_price">
        </div>
    </div>

</template>

<script>

export default {
    name: 'BoxPrice',
    props: [
        /*'min_price',
        'max_price',*/

    ],
    data() {
        return {
            min_price: 50,
            max_price: 7000000
        }
    },
    methods: {
        onChangePrice() {

            console.log('CHANGE PRICE');
            console.log(this.min_price);
            console.log(this.max_price);

            let price = {
                'min_price': this.min_price,
                'max_price': this.max_price,
            }

            this.$store.dispatch('filters/SET_PRICES_APPLY', price);
        }
    },
    mounted() {
        let price = {
            'min_price': this.min_price,
            'max_price': this.max_price,
        }
        this.$store.dispatch('filters/SET_PRICES_APPLY', price);
    }
}
</script>
