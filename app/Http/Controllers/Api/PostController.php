<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function index() {

        $posts = Post::all();
        return response()->json($posts);
    }


    public function show($id) {

        $post = Post::where('id', $id)->get();
        return response()->json($post);
    }


    public function filter($category=null){

        if ($category){
            $posts = Post::where("category_id", $category)->get();
        }
        else {
            $posts = Post::where("category_id", $request['category'])->get();
        }
        return response()->json($posts);
    }


}
