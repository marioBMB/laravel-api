<template>
     <div v-if='mounted == true' class="container">

            <h1>{{post.title}}</h1>
            
            <div class="post-info row justify-content-between">
                <div class="col-8">
                </div>
                <div class="col-4">
                    <h6><i class="fa-solid fa-clock"></i> {{dateTime(post.created_at)}}</h6>

                    <h5 class='text-primary'><i class="fa-solid fa-user "></i> {{post.user.name}}</h5>
                </div>
            </div>

            <p v-if="post.category"><strong>Categoria:</strong> {{post.category.name}}</p>
            <div v-if="post.tags.length > 0">
                <strong>Tags</strong>

                <ul>
                    <li v-for="tag in post.tags" :key="tag.id">
                        {{tag.name}}
                    </li>
                </ul>
            </div>
            <div v-html="post.content"></div>
            <img v-if="post.image" :src="`/storage/${post.image}`" alt="">
        </div>
</template>


<script>

export default {
    name: "SinglePost",
     data() {
            return {
                post: null,
                mounted: false
            }
        },
        methods: {

            dateTime: function($timeformat){
                return dayjs($timeformat).format('DD/MM/YYYY HH:mm'); // '25/01/2019'
            },
        },
        created() {
            axios.get(`/api/posts/${this.$route.params.slug}`)
            .then( (response) =>  {
                this.post = response.data;
                this.mounted = true;
            })
            .catch((error) => {
                console.log(error);
            });
        },
        mounted(){
        },
}

</script>


<style lang='scss' scoped>

</style>