<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class GenreFilter extends ApiFilter {

    protected $parms = [
        'id' => ['eq']            
    ];

    protected $operatorMap = [
        'eq' => '='
    ];    

}