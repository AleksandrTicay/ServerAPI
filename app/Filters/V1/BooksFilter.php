<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;

class BooksFilter{

    protected $parms = [
        'title' => ['lk']            
    ];

    protected $operatorMap = [
        'lk' => 'like'
    ];    

}