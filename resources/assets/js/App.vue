<template>
    <div class="vue-app-container">
        <layout-header></layout-header>
        <router-view></router-view>
        <layout-footer></layout-footer>
    </div>
</template>

<script>
    import LayoutHeader from "./layout/LayoutHeader";
    import LayoutFooter from "./layout/LayoutFooter";
    export default {
        name: "App",
        components: {
            LayoutFooter,
            LayoutHeader,
        },
        data(){
            return {
            }
        },
        created(){
            this.loadAppData();
        },
        methods:{
            async loadAppData(){
                
            },
        },
    }
</script>

<style scoped lang="scss">
</style>
