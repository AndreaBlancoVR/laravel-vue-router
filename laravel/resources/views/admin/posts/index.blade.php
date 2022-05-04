@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Data pubblicazione</th>
                    <th scope="col">Data creazione</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->published_at }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <button class="btn btn-small btn-warning" href="{{ route('admin.posts.edit', $post) }}" >Edit</button>
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