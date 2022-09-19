<?php
namespace App\Services\v1;
use Illuminate\Http\Request;

abstract class Query {
    protected $allowedParams = [];

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
