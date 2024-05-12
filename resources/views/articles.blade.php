@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="list-group">
                @foreach($articles as $article)
                    <div class="row">
                        <div class="col-8">
                            <a href="{{route('articles.show', $article->id)}}" class="list-group-item list-group-item-action active" aria-current="true">
                                {{$article->id}}. {{$article->title}}. Category - {{$article->category_id}}
                            </a>
                        </div>

                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection
