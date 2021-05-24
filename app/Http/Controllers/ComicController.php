<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:comics|string',
            'description' => 'required|string',
            'thumb' => 'required|string',
            'price' => 'required|between:0,99.99',
            'series' => 'required|string',
            'sale_date' => 'required|date',
            'type' => 'required|string'
        ]);

        $comic = $request->all();

        $comic_obj = new Comic();
        $comic_obj->title = $comic['title'];
        $comic_obj->description = $comic['description'];
        $comic_obj->thumb = $comic['thumb'];
        $comic_obj->price = $comic['price'];
        $comic_obj->series = $comic['series'];
        $comic_obj->sale_date = $comic['sale_date'];
        $comic_obj->type = $comic['type'];
        $comic_obj->save();

        $comic = Comic::orderBy('id', 'desc')->first();

        return redirect()->route('comics.show', compact('comic'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|unique:comics|string',
            'description' => 'required|string',
            'thumb' => 'required|string',
            'price' => 'required|between:0,99.99',
            'series' => 'required|string',
            'sale_date' => 'required|date',
            'type' => 'required|string'
        ]);
        $data = $request->all();
        $comic->update($data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
