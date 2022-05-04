@extends('layouts.app')

@section('content')

<div class="container">

    <form action="{{ route('admin.posts.store') }}" method= "POST">
        @csrf

        <label for="title">Titolo</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" aria-describedby="emailHelp">
        @error('title')
            <div class="invalid-feedback">{{ message }}</div>
        @enderror


        {{-- DA RIEMPIRE CON GLI ALTRI CMAPI DEL FORM --}}




        <button type="submit">Invia</button>

    </form>

</div>



@endsection