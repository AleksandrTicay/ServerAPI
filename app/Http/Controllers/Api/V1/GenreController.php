<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Genre;
use App\Http\Requests\V1\StoreGenreRequest;
use App\Http\Requests\V1\UpdateGenreRequest;
use App\Http\Controllers\Controller;
use App\Filters\V1\GenreFilter;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\V1\GenreResource;
use App\Http\Resources\V1\GenreCollection;
use App\Http\Resources\V1\BookCollection;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {               
        return new GenreCollection(Genre::all());         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGenreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        $books = Book::where('genre_id', $genre->id)->with('authors')->get();

        if(count($books) > 0) {
            return new BookCollection($books);  
        } else {                             
            return response()->json([
                'msg' => 'No books were found for that genre'
            ]); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGenreRequest  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        //
    }
}
