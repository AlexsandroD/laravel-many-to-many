@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ $tag->name }}</h3></div>
                <div class="card-body">


                    <div>
                        Slug:{{ $tag->name }}
                    </div>


                        @if(count($tag->posts) > 0)
                            <div class="mb-3">
                                @foreach ($tag->posts as $post)
                                    <li>{{ $post->title }}</li>
                                @endforeach
                            </div>
                        @endif

                    {{ $tag->content }}

                        <div class="d-flex my-2">
                            <a class="btn btn-info " href="{{ route("tags.edit",$tag->id) }}" role="button">Edit</a>

                            <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger mx-2">Delete</button>
                            </form>

                                <a class="btn btn-secondary " href="{{ route("tags.index") }}" role="button">Back</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
