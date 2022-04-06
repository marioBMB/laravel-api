<template>
    <div class="container">

       <Header />
       <Main :posts_prop="posts"/>
       <Footer />
    </div>
</template>

<script>
    import Header from './components/Header.vue';
    import Main from './components/Main.vue';
    import Footer from './components/Footer.vue';

    export default {

        name: 'App',
        components: {
            Header,
            Main,
            Footer
        },
        data() {
            return {
                posts: []
            }
        },
        created() {
            axios.get("/api/posts")
            .then( (response) =>  {
                console.log("response", response);
                this.posts = response.data;
            })
            .catch((error) => {
                console.log(error);
            });
        },
    }
</script>


<style lang='scss'>
    @import "/resources/sass/front.css";

</style>
