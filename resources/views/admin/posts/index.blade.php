@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a class="btn btn-success my-3" href="{{ route('posts.create') }}" role="button">Add Post</a>

            <div class="card">
                <div class="card-header">Lista Posts</div>

                <div class="card-body">
                    <table class="table table-dark">
                        <thead class="table responsive  text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">State</th>
                                <th scope="col">Category</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post )
                                <tr>
                                    <td class="text-center">{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td>
                                        @if ($post->published)
                                            <span class="badge badge-success m-3">Pubblicato</span>
                                            @else
                                            <span class="badge badge-secondary m-3">Bozza</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->category)
                                            <span class="badge badge-info m-3">{{$post->category->name}}</span>
                                        @else
                                            <span class="badge badge-secondary m-3">None</span>
                                        @endif
                                    </td>
                                     <td>
                                        @if ($post->tags)
                                            @foreach ($post->tags as $tag)
                                                <span class="badge badge-success p-1 m-3">{{ $tag->name }}</span>
                                            @endforeach
                                        @else
                                            @foreach ($post->tags as $tag)
                                                <span class="badge badge-secondary m-3">None</span>
                                            @endforeach
                                        @endif

                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" style=" min-width: 80px" href="{{ route("posts.show",$post->id) }}" role="button">Viualizza</a>
                                    </td>
                                     <td class="text-center">
                                        <a class="btn btn-info" style=" min-width: 80px" href="{{ route("posts.edit",$post->id) }}" role="button">Edit</a>
                                    </td>
                                    <td>
                                       <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                             <button type="submit" class="btn btn-danger" style=" min-width: 80px">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
