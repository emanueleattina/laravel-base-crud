@extends('layouts.app')

@section('main')
<main>
    <a href="{{route('home')}}">Home</a>
    <a href="{{route('comics.create')}}">Create</a>
    <div class="container">
        <div class="card-container">
        @foreach ($comics as $comic)
            <div class="card">
                <a href="{{route('comics.show', ['comic' => $comic->id])}}">
                    <img src="{{$comic->thumb}}" alt="">
                    <h4>{{$comic->title}}</h4>
                    <h5>{{$comic->series}}</h5>
                    <h6>${{$comic->price}}</h6>
                    <h6>{{$comic->type}}</h6>
                    <h6>{{$comic->sale_date}}</h6>
                    {{-- <p>{{$comic->description}}</p> --}}
                </a>
            </div>        
        @endforeach
        </div>
    </div>
</main>
@endsection
