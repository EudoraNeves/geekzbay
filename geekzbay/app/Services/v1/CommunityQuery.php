<?php

namespace App\Services\v1;
use Illuminate\Support\Str;

class CommunityQuery extends Query {
    protected $allowedParams = [
        'name' => 'nameFilter',
        'category' => 'categoryFilter'
    ];

    protected function nameFilter($query) {
        return [Str::of('name')->lower(), 'LIKE', `%$query%`];
    }

    protected function categoryFilter($query) {
        return['category_id','=', $query];
    }
}

?>
