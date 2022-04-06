@extends('layouts.admin')

@section('title', 'Boolpress - '.$post->title)

@section('content')
<div class="container col-md-10">

    <div class="post-container m-5">

        <div class="post-header row justify-content-between">
            <div class="col-8">
                <h2>{{$post->title}}</h2>
            </div>
            <div class="col-4">
                <h6><i class="fa-solid fa-clock"></i> {{$post->created_at}}</h6>
                <h5 class='text-primary'><i class="fa-solid fa-user "></i> {{$post->user->name}}</h5>
            </div>
        </div>


        <div class='post-meta'>
            
            <div class="category">
                Categoria: <strong>{{$post->category? $post->category->name: "-"}}</strong>
            </div>

            <div class="tags">
                <i class="fa-solid fa-tags"></i>:
                
                @foreach ($post->tags as $tag)
                    
                <a href={{'/posts/tags/'.$tag->slug}} class="tag-box">
                    <strong>{{$tag->name }}</strong>
                </a> 

                @endforeach
            </div>

        </div>

        <div class="post-content my-5">
            <p>{{$post->content}}</p>

            <div class="post-image">
                <img src="{{ asset('storage/' . $post->image) }}" alt="">
            </div>
        </div>
            {{-- <img src="{{$comic->thumb}}" alt=""> --}}

         {{-- @php endif; @endphp --}}

    <div class="post-options row">

        <a class='pr-2' href="{{route("admin.posts.index")}}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Indietro</button></a>
        
        <form action="{{route('admin.posts.destroy', $post->id)}}">
            @csrf
            @method("DELETE")
            <button onclick="return confirm('Sicuro di voler cancellare questo post?');" type='submit' class='btn btn-danger'>Elimina post</button>
        </form>
    </div>
</div>
  
@endsection