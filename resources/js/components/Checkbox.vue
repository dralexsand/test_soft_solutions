<template>
    <div class="form-check">

        <input
            class="form-check-input"
            type="checkbox"
            value=""
        >
        <label class="form-check-label"
        >
            {{ message }}
        </label>

    </div>
</template>
<script>
export default {
    name: 'Checkbox',
    props: [
        'message',
        'box_id',
        'box_class',
    ],

}
</script>
