@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <h3>{{$article->title}}</h3>
                <p class="lead">Content: {{$article->content}}</p>
                <p class="lead">Image: {{$article->image}}</p>
                <p class="lead">Likes: {{$article->likes}}</p>
            </div>
        </div>
        <div class="row row-cols-auto">

            <div class="coll">
                <form action="{{route('articles.edit', $article->id)}}">
                    <button type="submit" class="btn btn-primary">
                        Edit
                    </button>
                </form>
            </div>

            <div class="coll">
                <form action="{{route('articles.destroy', $article->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
            </div>

            <div class="coll">
                <form action="{{route('articles.index')}}">
                    <button type="submit" class="btn btn-primary">
                        Back
                    </button>
                </form>
            </div>

        </div>
    </div>
@endsection
