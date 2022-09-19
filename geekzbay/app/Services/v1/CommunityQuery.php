<?php

namespace App\Services\v1;
use Illuminate\Support\Str;

class CommunityQuery extends Query {
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
}

?>
