<?php

namespace App\Services\v1;

class LocationQuery extends Query {
    protected $allowedParams = [
        'name' => 'nameFilter',
        'category' => 'categoryFilter',
    ];

    protected function nameFilter($query) {
        $query = strtolower($query);
        return ['name', 'LIKE', `%$query%`];
    }

    protected function categoryFilter($query) {
        return['category_id','=', $query];
    }
}

?>
