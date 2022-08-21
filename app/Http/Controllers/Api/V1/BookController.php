<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Http\Requests\V1\StoreBookRequest;
use App\Http\Requests\V1\UpdateBookRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BookResource;
use App\Http\Resources\V1\BookCollection;
use App\Filters\V1\BooksFilter;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {                
        $filter = new BooksFilter();
        $filterItems = $filter->transform($request);
        

        if(count($filterItems) == 0) {

            $result = new BookCollection(Book::where('amount', '>', 0)->with('genre')->with('authors')->paginate()); 
            if(count($result) > 0) {
                return $result;
            } else {
                return response()->json([
                    'msg' => 'No books were found'
                ]); 
            }            
        } else {              
            $result = new BookCollection(Book::where('amount', '>', 0)->where($filterItems)->paginate());
            if(count($result) > 0) {
                return $result;
            } else {
                return response()->json([
                    'msg' => 'No books were found with that title'
                ]); 
            }            
        }        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $genre = Genre::firstOrCreate([
            'name' => $request->genre
        ]);

        $book = $genre->books()->create([
            'title' => $request->title,
            'amount' => $request->amount,
            'published_year' => $request->published_year,
        ]);

        $authors = explode(',', $request->authors);
        foreach( $authors as $author) {
            $singleAuthor = Author::firstOrCreate([
                'name' => $author
            ]);

            $book->authors()->attach($singleAuthor);
        }   
        
        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
