@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ $category->name }}</h3></div>
                <div class="card-body">


                    <div>
                        @if($category->category)
                        <strong>Category: {{ $category->category->name}}</strong>
                        @endif
                    </div>
                    {{ $category->content }}

                   <div class="d-flex my-2">
                       <a class="btn btn-info " href="{{ route("categories.edit",$category->id) }}" role="button">Edit</a>

                       <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                           @csrf
                           @method("DELETE")
                           <button type="submit" class="btn btn-danger mx-2">Delete</button>
                       </form>

                         <a class="btn btn-secondary " href="{{ route("categories.index") }}" role="button">Back</a>

                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
