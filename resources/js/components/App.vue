<template>
    <div>

        <navbar/>
        <b-container class="mt-3">
            <b-row>
                <router-view />
            </b-row>
        </b-container>

    </div>
</template>
<script>

import Navbar from './parts/Navbar';

export default {

    components: {
        'navbar': Navbar
    }

}
</script>
