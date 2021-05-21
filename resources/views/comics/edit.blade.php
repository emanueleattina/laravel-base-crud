@extends('layouts.app')

@section('main')
<main>
    <a href="{{route('home')}}">Home</a>
    <a href="{{route('comics.show', ['comic' => $comic->id])}}">Back</a>
    <form action="{{route('comics.update', ['comic' => $comic->id])}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{$comic->title}}" placeholder="title">
        <input type="text" name="description" value="{{$comic->description}}" placeholder="description">
        <input type="text" name="thumb" value="{{$comic->thumb}}" placeholder="thumb">
        <input type="text" name="price" value="{{$comic->price}}" placeholder="price">
        <input type="text" name="series" value="{{$comic->series}}" placeholder="series">
        <input type="date" name="sale_date" value="{{$comic->sale_date}}" placeholder="sale_date">
        <input type="text" name="type" value="{{$comic->type}}" placeholder="type">
        <input type="submit" name="" value="submit">
    </form>
</main>
@endsection
