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
                    <form action="{{route("posts.update",$post->id)}}" method="POST">
                        @csrf
                        @method("PUT")

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" id="title" placeholder="Post Title" placeholder="Title" value="{{ old('title') ? old('title') : $post->title }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Write the post Here</label>
                            <textarea class="form-control  @error('content') is-invalid @enderror" name="content" id="content" placeholder="content" placeholder rows="6">{{ old('content') ? old('content') : $post->content }}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tags  --}}
                        @foreach($tags as $tag)
                            <div class="form-check form-check-inline my-2">
                                @if (old("tags"))
                                    <input type="checkbox" class="form-check-input" class = "form-control id="{{ $tag->slug }} " name="tags[]" value="{{ $tag->id}}" {{in_array($tag->id,old("tags",[])) ?  'checked="checked"' : ''}}>
                                @else
                                     <input type="checkbox" class="form-check-input" class = "form-control id="{{ $tag->slug }} " name="tags[]" value="{{ $tag->id}}" {{ $post->tags->contains($tag) ? 'checked="checked"' : ''}}>
                                @endif
                                <label class="form-check-label" for="{{ $tag->name }}">{{ $tag->name }}</label>
                            </div>
                             @error('tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        @endforeach

                        <div class="form-group">
                            <label for="category">Categories</label>
                            <select class="form-select" class="form-control  @error('category') is-invalid @enderror" name="category_id" id="category" >
                                <option value="" {{ old("category_id") == "" ? "selected" : "" }}>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old("category_id", $post->category_id) == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                             @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                         <div class="form-group form-check">
                             @php
                                $published = old('published') ? old('published') : $post->published;
                             @endphp
                             <input type="checkbox" class="form-check-input" class="form-control  @error('published') is-invalid @enderror"  name="published" id="published " {{  $published ? 'checked' : '' }}>
                             <label class="form-check-label" for="published">Pubblica</label>

                             @error('published')
                                <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                         </div>
                         <button class="btn btn-primary" type="submit">modifica</button>
                         <a class="btn btn-secondary " href="{{ route("posts.index") }}" role="button">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
