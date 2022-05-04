@extends('layouts.app')

@section('content')

<div class="container">

    <h1>
        Crea nuovo post
    </h1>

    <form action="{{ route('admin.posts.store') }}" method= "POST">
        @csrf

        <div class="form-group">
            <label for="title">Titolo*</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" aria-describedby="emailHelp">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Contenuto dell'articolo*</label>
            {{-- <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" aria-describedby="emailHelp"> --}}
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="30">{{ old('content') }}</textarea>
            @error('published_at')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

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