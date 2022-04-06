<template>
    <div class="container">

        <header>
            <nav>
                <li><router-link :to="{ name: 'home' }">HOME</router-link></li>
                <li><router-link :to="{ name: 'about' }">CHI SIAMO</router-link></li>
            </nav>
        </header>
    </div>
</template>

<script>


    export default {

        name: 'Header',
        components: {
            
        },
        data() {
            return {
                posts: []
            }
        },
        created() {
            axios.get("/api/posts")
            .then( (response) =>  {
                this.posts = response.data;
            })
            .catch((error) => {
                console.log(error);
            });
        }
    }
</script>


<style lang='scss' scoped>

</style>
