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

    public function transform(Request $request) {
        $eloQuery = [];

        foreach ($this->parms as $parm => $operators) {
            $query = $request->query($parm);

            if(!isset($query)) {
                continue;
            }            

            foreach ($operators as $operator) {
                if(isset($query[$operator])) {
                    $eloQuery[] = [$parm, $this->operatorMap[$operator],'%' . $query[$operator] . '%'];
                }
            }

        }

        return $eloQuery;

    }

}