@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <h3>{{$article->title}}</h3>
            <p class="lead">Content: {{$article->content}}</p>
            <p class="lead">Image: {{$article->image}}</p>
            <p class="lead">Likes: {{$article->likes}}</p>

            <form action="{{route('articles.edit', $article->id)}}">
                <button type="submit" class="btn btn-primary">
                    Edit
                </button>
            </form>

            <form action="{{route('articles.destroy', $article->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">
                    Delete
                </button>
            </form>

            <form action="{{route('articles.index')}}">
                <button type="submit" class="btn btn-primary">
                    Back
                </button>
            </form>

        </div>
    </div>
@endsection
