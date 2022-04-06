<template>
    <div class="container-grid">
        <div v-for='category in categories' :key='category.slug' class='category'>
            <div class="title">{{category.name}} ({{category.posts.length}})</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Categories",
    data() {
        return {
            categories: []
        }
    },
    created() {
        axios
        .get('/api/categories')
        .then((response) => {
            this.categories = response.data;
        })
        .catch((error) => {
            console.log(error);  
            this.$router.push({name: 'page-404'});                      
        });
                                   
    }
}
</script>

<style lang='scss' scoped>

</style>