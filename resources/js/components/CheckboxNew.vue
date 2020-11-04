<template>
    <label>
        <input type="checkbox"/>
        <span></span>
    </label>
</template>
<script>
export default {
    name: 'c-checkbox',
};
</script>
<style lang="scss">
:root {
    label {
        position: relative;
    }

    span {
        width: 16px;
        height: 16px;
        border: 1px solid #ccc;
        display: inline-block;
        border-radius: 50%;
        transition: all linear 0.3s;

        &:after {
            content: "";
            position: absolute;
            top: -1px;
            left: 6px;
            border-bottom: 2px solid #fff;
            border-right: 2px solid #fff;
            height: 9px;
            width: 4px;
            transform: rotate(45deg);
            visibility: hidden;
        }
    }

    input {
        display: none;

        &:checked ~ span {
            background: #ccc;

            &:after {
                visibility: visible;
            }
        }
    }
}
</style>
