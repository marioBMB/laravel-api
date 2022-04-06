@extends('layouts.admin')


@section('title', 'Boolpress - modifica categoria')


@section('content')

    <div class="container">

        <div class="category-header row justify-content-between">
            
            <div class="col">
                <h2 class='title'>Modifica categoria</h2>
            </div>
            
            <div class="col-auto">
                <a href="{{route('admin.posts.index')}}" class='btn btn-primary'><i class="fa fa-arrow-left" aria-hidden="true"></i> Indietro</a>
            </div>
        </div>

        <form action="{{route('admin.categories.update', $category->id)}}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nome</label>

                <input type="text" class="form-control @error('name') is-invalid @enderror"
                id="name" name="name" placeholder='Inserisci il nome della categoria' value='{{ old('name')?? $category->name }}'>
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Immagine di anteprima</label>

                <input type="file" class="form-control @error('name') is-invalid @enderror"
                id="thumb" name="thumb" placeholder='Anteprima della categoria' value='{{ old('name')?? $category->thumb }}'>
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success"><strong><i class="fa-solid fa-floppy-disk"></i></strong>  Modifica</button> 

        </form>

    </div>





@endsection