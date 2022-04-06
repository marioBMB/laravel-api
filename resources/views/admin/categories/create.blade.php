@extends('layouts.admin')

@section('title', 'Boolpress - Aggiungi nuova categoria')

@section('content')


<div class="container">

    <div class='title'>
        <h1>Nuova categoria</h1>
    </div>
        
    <form action="{{route('admin.categories.store')}}" method="POST" enctype='multipart/form-data'>
        @csrf    
        
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
            id="name" name="name" placeholder="Inserisci il nome della categoria">
            @error('name')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        
        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="Inserisci l'url dell'immagine del post">
        </div>
        
        <button type="submit" class="btn btn-success"><strong><i class="fa-solid fa-floppy-disk"></i></strong> Crea categoria</button> 
    </form>

</div>

@endsection