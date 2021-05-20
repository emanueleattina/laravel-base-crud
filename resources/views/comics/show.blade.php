@extends('layouts.app')

@section('main')
    <a href="{{route('comics.index')}}">Back</a>
    <a href="{{route('home')}}">Home</a>
    <div class="container">
        <div class="card-container">
            <div class="card">
                <a href="{{route('comics.show', ['comic' => $comic->id])}}">
                    <img src="{{$comic->thumb}}" alt="">
                    <h2>{{$comic->title}}</h2>
                    <h5>{{$comic->series}}</h5>
                    <h6>{{$comic->price}}</h6>
                    <h6>{{$comic->type}}</h6>
                    <h6>{{$comic->sale_date}}</h6>
                    <p>{{$comic->description}}</p>
                </a>
            </div>        
        </div>
    </div>
@endsection
