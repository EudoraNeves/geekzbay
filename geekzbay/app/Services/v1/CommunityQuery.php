<?php

namespace App\Services\v1;
use Illuminate\Http\Request;

class CommunityQuery {
    // The parameters one can search through, as well as the query applied by it.
    protected $allowedParams = [
        'name' => ['like', '%', '%'],
        'category' => ['=', '', '']
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
            $eloQuery[] = [$param,$operator[0], $operator[1] . $query . $operator[2]];
        }
        return $eloQuery;
    }
}

?>
