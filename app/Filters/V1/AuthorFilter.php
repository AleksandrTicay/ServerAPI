<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class AuthorFilter extends ApiFilter {

    protected $parms = [
        'name' => ['eq']            
    ];

    protected $operatorMap = [
        'eq' => '='
    ];    

}