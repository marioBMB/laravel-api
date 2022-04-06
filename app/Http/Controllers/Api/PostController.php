<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function index() {

        $posts = Post::with(['category', 'tags'])->get();
        return response()->json($posts);
    }


    public function show($slug) {

        $post = Post::where("slug", $slug)->with(["category", "tags", "user"])->first();
        return response()->json($post);
    }


    public function filterByCategory($categoryName){

        $posts = Post::whereHas('category', function($query) use($categoryName) {
            $query->where('name', $categoryName);
        });
        return response()->json($posts->get());
    }


    public function filterByTag($tagName){

        $posts = Post::whereHas('tags', function($query) use($tagName) {
            $query->where('name', $tagName);
        });
        return response()->json($posts->first());
    }


    public function filterByTags($tagsSlug){

        if ( str_contains($tagsSlug, "-")){
            $tags = explode("-", $tagsSlug);
        }
        else {
            $tags = compact('tagsSlug');
        }
        $posts = Post::whereHas('tags', function($query) use($tags) {
            $query->whereIn('name', $tags);
        });
        return response()->json($posts->get());
    }

}
