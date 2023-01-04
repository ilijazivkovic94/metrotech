<template>
    <div>
        <slot name="menu-body"></slot>
    </div>
</template>

<script>
    export default {
        name: "RightClickMenu"
    }
</script>

<style scoped lang="scss">
    ul{
        background: #18191c;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        display: block;
        list-style: none;
        margin: 0;
        position: absolute;
        width: 225px;
        z-index: 999999;
        padding: 5px 10px !important;
        li {
            border-bottom: 1px solid #262729;
            margin: 0;
            padding: 5px 5px;
            color: #b6b8bb;
            cursor: pointer;
            font-size: 13px;
        }
        li:last-child {
            border-bottom: none;
        }
        li:hover {
            background: #979da41c;
            color: #FAFAFA;
        }
    }
</style>
