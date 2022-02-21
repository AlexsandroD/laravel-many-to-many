@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a class="btn btn-success my-3" href="{{ route('tags.create') }}" role="button">Add Tag</a>

            <div class="card">
                <div class="card-header">Lista Tags</div>

                <div class="card-body">
                    <table class="table table-dark">
                        <thead class="table responsive text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag )
                                <tr>
                                    <td class="text-center">{{ $tag->id }}</td>
                                    <td>{{ $tag->title }}</td>
                                    <td>{{ $tag->slug }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" style=" min-width: 80px" href="{{ route("tags.show",$tag->id) }}" role="button">Viualizza</a>
                                    </td>
                                     <td class="text-center">
                                        <a class="btn btn-info" style=" min-width: 80px" href="{{ route("tags.edit",$tag->id) }}" role="button">Edit</a>
                                    </td>
                                    <td>
                                       <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
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
