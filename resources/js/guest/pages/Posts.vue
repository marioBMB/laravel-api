<!-- VERSIONE CON PROPS EREDITATA E METODI DI FILTRAGGIO CUSTOM -->

<template>
        <div class="row justify-content-center">
            
            <div class="col-md-8">
                <div v-for="(post, index) in posts" :key='index' class="card my-5">
                    
                    <div class="card-header">
                        <div class="post-info">
                            <h3 class='post-title'>{{post.title}}</h3>
                            
                            <span><i class="fa-solid fa-clock"></i> <h6 class='d-inline-block'>{{dateTime(post.created_at)}}</h6></span>

                            <div v-if='post.category' class="category"><i class="fa-solid fa-book"></i> {{post.category.name}}</div>
                            
                            <div v-if="post.tags && post.tags.length">
                                <div class='tag-container'>
                                    <h5><i class="fa-solid fa-tags"></i> Tags:</h5>
                                    <ul class="tags">
                                        <li v-for="tag in post.tags" :key="tag.slug" class="tag">
                                            <router-link :to="{ name: 'posts-tags', params: {slug: tag.name} }">{{tag.name}}</router-link>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="post-image">
                            <img v-if='post.image' class='cover' :src="`/storage/${post.image}`" alt="">
                        </div>
                    </div>

                    <div class="card-body">
                        <p class='content'>{{post.content}}</p>
                    </div>
                    
                    <div class='ml-4 mb-2'>
                        <router-link :to="{ name: 'single-post', params: {slug: post.slug} }">Visualizza post</router-link>
                    </div>
                </div>
            </div>
        </div>
</template>


<script>

export default {
    name: "Posts",
    props: {
        "postsprop": Array
    },
    data: function(){
        return {
            posts: [],
        }
    },
    methods: {
        dateTime: function($timeformat){
            return dayjs($timeformat).format('DD/MM/YYYY HH:mm'); // '25/01/2019'
        },
        filterByTags: function($tagName){

            let matchedPosts = [];

            this.posts.forEach((post) => {

                if (post.tags[0] && post.tags[0].name == $tagName){
                    matchedPosts.push(post);
                }
            });
            this.posts = matchedPosts;
        },
        filterByCategory: function($categoryName){
            
            let matchedPosts = [];

            this.posts.forEach((post) => {

                if (post.category && post.category.name == $categoryName){
                    matchedPosts.push(post);
                }
            });
            this.posts = matchedPosts;
        },
        main: function(){

            console.log("postsprop", this.postsprop); /* è lo stesso di this.$props.postsprops */

            let path = this.$route.path;
            let slug = this.$route.params.slug ?? "";

            if (path.includes('tags')){
                this.filterByTags(slug);
            }
            else if (path.includes('category')){
                this.filterByCategory(slug);
            }
        }
    },
    created() {

    },
    mounted() {
        this.main();
    },
    watch: {
        postsprop: function(newVal) { 
            this.posts = newVal;
            this.main();
        },
    },
}
</script>


<style lang='scss' scoped>

    .post-info {
        float: left;
        width: 70%;
        height: 200px;

        .post-title {
            margin-bottom: 2rem;
        }
    }

    .post-image {
        float: right;
        height: 200px;
        width: 30%;
        border: 1px solid #ccc;
        background-color: #bbb;

        img {
            object-fit: cover;
            height: 100%;
            width: 100%;
            object-position: right;
        }
    }


    .tags {
        list-style-type: none;
        padding-left: 10px;
    }

    .tag {
        background-color: royalblue;
        color: white;
        border-radius: 20px;
        display: inline-block;
        padding: 2px 5px;
        margin: 0 1px;

        a{
            display: block;
            cursor: pointer;
            color: white;
        }
    }

    .tag-container {
        display: flex;
        height: 3rem;
    }
</style>