@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Nuovo Post</h3>
                </div>

                <div class="card-body">
                    <form action="{{route("posts.store")}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" id="title" placeholder="Post Title" placeholder="Title" value="{{ old('title') }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{--   content --}}
                        <div class="form-group">
                            <label for="content">Write the post Here</label>
                            <textarea class="form-control  @error('content') is-invalid @enderror" name="content" id="content" placeholder="content" value=""placeholder rows="6">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- select --}}
                        <div class="form-group">
                            <label for="category">Categories</label>
                            <select class="form-select" class="form-control  @error('category') is-invalid @enderror" name="category_id" id="category" >
                                <option value="" {{ old("category_id") == "" ? "selected" : "" }}>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old("category_id") == "" ? "selected" : "" }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                             @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tags  --}}
                        @foreach($tags as $tag)
                            <div class="form-check form-check-inline my-2">
                                <input type="checkbox" class="form-check-input" class = "form-control id="{{ $tag->slug }} " name="tags[]" value="{{ $tag->id}}" {{in_array($tag->id,old("tags",[])) ? 'checked="checked"' : ''}}>
                                <label class="form-check-label" for="{{ $tag->slug }}">{{ $tag->name }}</label>
                            </div>
                             @error('tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        @endforeach

                        {{-- checkbox --}}
                         <div class="form-group form-check">
                             <input type="checkbox" class="form-check-input"class = "form-control  @error('published') is-invalid @enderror"  name="published" id="published " {{ old('published') ? 'checked' : '' }}>
                             <label class="form-check-label" for="published">Pubblica</label>
                             @error('published')
                                <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                         </div>


                         {{-- add image upolad --}}
                         <div class="form-group">
                             <label for="image">add image</label>
                             <input type="file" class="form-control-file" id="image" name="image">
                         </div>

                     <button class="btn btn-primary" type="submit">Add Post</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
