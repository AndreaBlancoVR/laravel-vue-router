@extends('layouts.app')

@section('content')

    <div class="container">
        <a class="btn btn-primary" href=" {{route('admin.posts.create')}} ">Crea Articolo</a>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ultima Modifica</th>
                    <th scope="col">Ultima Modifica</th>
                    <th scope="col">Data creazione</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>
                            @foreach ( $post->tags as $tag )
                            <span class="badge badge-pill badge-info">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>{{ $post->category ? $post->category->name : '' }}</td>
                        {{-- <td>{{ $post->published_at }}</td> --}}
                        <td>{{ $post->published_at ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->published_at)->locale('it-IT')->diffForHumans() : '' }}</td>
                        <td>{{ App\Post::getDate($post->published_at, 'l j F') }}</td>
                        <td>{{ App\Post::getDate($post->created_at) }}</td>
                        <td>
                            <a class="btn btn-small btn-warning" href="{{ route('admin.posts.edit', $post) }}" >Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{-- <ul>
        @foreach ($posts as $post)
        <li>
            {{ $post->title }}
        </li>
        @endforeach
    </ul> --}}

@endsection