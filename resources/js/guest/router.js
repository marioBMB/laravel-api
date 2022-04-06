import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import About from "./pages/About";
import SinglePost from "./pages/SinglePost";
import Posts from "./pages/Posts";
import Categories from "./pages/Categories";
import PageNotFound from "./pages/PageNotFound";


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/chi-siamo",
            name: "about",
            component: About
        },
        {
            path: "/posts",
            name: "posts",
            component: Posts,
            meta:{
                // apiPath:'posts/'
            }
        },
        {
            path: "/posts/:slug",
            name: "single-post",
            component: SinglePost,
        },
        {
            path: "/posts/category/:slug",
            name: "posts-category",
            component: Posts,
        },
        {
            path: "/posts/tags/:slug",  /* N.B. attenzione a dare il prefisso "/" alle rotte se no fa l'append!!! */
            name: "posts-tags",
            component: Posts
        },
        {
            path: "/categories",
            name: "categories",
            component: Categories
        },
        {
            path: "*",
            name: "page404",
            component: PageNotFound
        }
    ]  
});

export default router