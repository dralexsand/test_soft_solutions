<template>
    <div>
        <h1>Home.vue</h1>

        <list_cars/>

    </div>
</template>
<script>
import ItemCars from "../components/ItemCars";

export default {
    components: {
        'list_cars': ItemCars
    }
}
</script>
