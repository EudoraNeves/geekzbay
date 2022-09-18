<?php

namespace App\Services\v1;
use Illuminate\Http\Request;

class CommunityQuery {
    // The parameters one can search through, as well as the query applied by it.
    protected $allowedParams = [
        'name' => ['name', 'like', '%', '%'],
        'category' => ['category_id', '=', '', '']
    ];

    public function transform(Request $request) {
        $eloQuery = [];

        // Run through the parameters inside of  allowedParams
        foreach($this->allowedParams as $param => $operator) {

            $query = $request->query($param);

            // Find the parameter inside allowedParams in the current query
            if(!isset($query)) {
                continue;
            }

            // These will be entered in ->where(column, operator, value)
            $eloQuery[] = [$operator[0], $operator[1], $operator[2] . $query . $operator[3]];
        }
        return $eloQuery;
    }
}

?>
