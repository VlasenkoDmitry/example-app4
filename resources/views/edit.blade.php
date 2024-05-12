@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{route('articles.update',$article->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="title" value="{{$article->title}}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea type="text" name="content" class="form-control">{{$article->content}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" name="image" class="form-control" value="{{$article->image}}">
                </div>
                <div class="mb-3">
                    <label for="likes" class="form-label">Likes</label>
                    <input type="number" name="likes" class="form-control" value="{{$article->likesUsers}}">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" id="category" name="category_id">
                        @foreach($categories as $category)
                            <option
                                {{$article->category_id === $category->id ? 'selected' : ''}}
                                value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tag" class="form-label">Tag</label>
                    <select class="form-select" id="tag" name="tag_id[]" multiple >
                        @foreach($allTags as $tag)

                            <option
                                @foreach($articleTags as $articleTag)
                                    {{$articleTag->id === $tag->id ? 'selected' : ''}}
                                @endforeach
                                value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
