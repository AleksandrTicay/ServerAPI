<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Author;
use App\Http\Requests\V1\StoreAuthorRequest;
use App\Http\Requests\V1\UpdateAuthorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Filters\V1\AuthorFilter;
use Illuminate\Support\Arr;
use App\Models\Book;
use App\Http\Resources\V1\BookCollection;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new AuthorFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0) {
            return response()->json([
                'msg' => '404 Query not found'
            ]);
        } else {            
            $author = Author::where($queryItems)->get();
            $books= $author->books;         
                        
            foreach($books as $key => $book) {
                $book['author'] = $author->name;                
            }            
            return new BookCollection($books); 
        }
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
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
    }
}
