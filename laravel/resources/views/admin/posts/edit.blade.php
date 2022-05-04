@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-10">
            <h1>
                Modifica Post: {{ $post->title }}
            </h1>        
        </div>
        <div class="col-2">
            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>

<div class="container">

    
    <form action="{{ route('admin.posts.update',$post) }}" method= "POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titolo*</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?: $post->title}}" aria-describedby="emailHelp">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Contenuto dell'articolo*</label>
            {{-- <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" aria-describedby="emailHelp"> --}}
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="30"> {{ old('content') ?: $post->content}} </textarea>
            @error('published_at')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="published_at">Data di pubblicazione</label>
            <input type="date" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at') ?: Str::substr($post->published_at, 0, 10) }}" aria-describedby="emailHelp">
            @error('published_at')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        

        <button type="submit">Invia</button>

    </form>

</div>



@endsection