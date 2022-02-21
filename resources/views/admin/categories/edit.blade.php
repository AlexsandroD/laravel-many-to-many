@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit</h3>
                </div>

                <div class="card-body">
                    <form action="{{route("categories.update",$category->id)}}" method="POST">
                        @csrf
                        @method("PUT")

                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="Post name" placeholder="Name" value="{{ old('name') ? old('name') : $category->name }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">modifica</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
