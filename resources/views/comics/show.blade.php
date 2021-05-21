@extends('layouts.app')

@section('main')
    <a href="{{route('home')}}">Home</a>
    <a href="{{route('comics.index')}}">Back</a>
    <a href="{{route('comics.edit', ['comic' => $comic->id])}}">Edit</a>
    <button @click="deleteThis = true" href="">Delete</button>
    <div class="container">
        <div class="card-container">
            <div class="card">
                {{-- <a href="{{route('comics.show', ['comic' => $comic->id])}}"> --}}
                    <img src="{{$comic->thumb}}" alt="">
                    <h2>{{$comic->title}}</h2>
                    <h5>{{$comic->series}}</h5>
                    <h6>{{$comic->price}}</h6>
                    <h6>{{$comic->type}}</h6>
                    <h6>{{$comic->sale_date}}</h6>
                    <p>{{$comic->description}}</p>
                {{-- </a> --}}
            </div>        
        </div>
    </div>
    <div class="delete-popup" v-if="deleteThis == true">
        <div class="sure">
            <h1>Sure?</h1>
            <div class="buttons">
                <form action="{{route('comics.destroy', ['comic' => $comic->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" name="" value="yes">
                </form>
                <button @click="deleteThis = false">no</button>
            </div>
        </div>
    </div>
@endsection
