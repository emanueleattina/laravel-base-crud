@extends('layouts.app')

@section('main')
<main>
    <form action="{{route('comics.store')}}" method="post">
        @csrf
        @method('POST')
        <input type="text" name="title" value="" placeholder="title">
        <input type="text" name="description" value="" placeholder="description">
        <input type="text" name="thumb" value="" placeholder="thumb">
        <input type="text" name="price" value="" placeholder="price">
        <input type="text" name="series" value="" placeholder="series">
        <input type="date" name="sale_date" value="" placeholder="sale_date">
        <input type="text" name="type" value="" placeholder="type">
        <input type="submit" name="" value="submit">
    </form>
</main>
@endsection
