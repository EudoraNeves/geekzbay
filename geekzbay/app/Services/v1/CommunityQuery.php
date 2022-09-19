<?php

namespace App\Services\v1;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommunityQuery {
    // The parameters one can search through, as well as the query applied by it.
    protected $allowedParams = [
        'name' => 'nameParse',
        'category' => 'categoryParse'
    ];

    protected function nameParse($query) {
        return [Str::of('name')->lower(), 'LIKE', `%$query%`];
    }

    protected function categoryParse($query) {
        return['category_id','=', $query];
    }

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
            // This next line made me literally lose 1000 braincells, so do not touch please
            $eloQuery[] = $this->{$this->allowedParams[$param]}($query);
        }
        return $eloQuery;
    }
}

?>
