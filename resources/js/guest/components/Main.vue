<template>
    
    <main>
        <router-view :key="$route.path" :postsprop='posts_prop'></router-view>
    </main>
</template>

<script>


    export default {

        name: 'Main',
        components: {
           
        },
        props: {
            'posts_prop': Array,
        },
        data() {
            return {
            }
        },
        created() {
        }
    }
</script>


<style lang='scss' scoped>

</style>
