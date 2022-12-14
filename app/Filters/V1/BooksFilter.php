<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class BooksFilter extends ApiFilter {

    protected $parms = [
        'title' => ['lk']            
    ];

    protected $operatorMap = [
        'lk' => 'like'
    ];    

}