@extends('layouts.app')

@section('content')

<div class="container">

    <h1>
        Crea nuovo post
    </h1>

    <form action="{{ route('admin.posts.store') }}" method= "POST">
        @csrf
        
            {{-- TITOLO --}}

        <div class="form-group">
            <label for="title">Titolo*</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" aria-describedby="emailHelp">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

           {{-- CATEGORIE --}}

        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="">-- nessuna --</option>
                @foreach ($categories as $category)
                    {{-- non funziona l'operatore terniario e non capisco perchè 
                   <option {{ old('category_id') && old('category_id') == $category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                   --}}
                   <option {{ old('category_id') == $category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>  
                @endforeach
            </select>
                
        </div>

        {{-- TAGS --}}
        <label for="">Tags</label>
        <div class="d-flex" style="gap: 1rem;">
            @foreach($tags as $tag)
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" value="{{ $tag->id }}"name="tags[]" id="tags-{{ $tag->id }}">
                    <label class="form-check-label"for="tags-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>

         {{-- CONTENUTO ARTICOLO --}}

        <div class="form-group">
            <label for="content">Contenuto dell'articolo*</label>
            {{-- <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" aria-describedby="emailHelp"> --}}
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="30">{{ old('content') }}</textarea>
            @error('published_at')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- DATA PUBBLICAZIONE --}}

        <div class="form-group">
            <label for="published_at">Data di pubblicazione</label>
            <input type="date" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at') }}" aria-describedby="emailHelp">
            @error('published_at')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        

        <button type="submit">Invia</button>

    </form>

</div>



@endsection