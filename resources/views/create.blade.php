@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">

{{--            @if ($errors->any())--}}
{{--                <div>--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{'Аrticle not created '}}
                </div>
            @endif


            <form action="{{route('articles.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input value="{{old('title')}}" type="text" name="title" class="form-control" id="title" placeholder="title">
                    @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea type="text" name="content" class="form-control">{{old('content')}}</textarea>
                    @error('content')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input value ="{{old('image')}}" type="text" name="image" class="form-control">
                    @error('image')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="likesUsers" class="form-label">Likes</label>
                    <input value ="{{old('likesUsers')}}" type="number" name="likesUsers" class="form-control">
                    @error('likesUsers')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" id="category" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tag" class="form-label">Tag</label>
                    <select  class="form-select" id="tag" name="tag_id[]" multiple >
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>
    </div>
@endsection
