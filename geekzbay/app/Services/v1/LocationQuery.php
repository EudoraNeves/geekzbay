<?php

namespace App\Services\v1;

class LocationQuery extends Query {
    protected $allowedParams = [
        'name' => 'nameFilter',
        'type' => 'typeFilter',
        'city' => 'cityFilter'
    ];

    protected function nameFilter($query) {
        return ['name', 'LIKE', '%' . strtolower($query) . '%'];
    }

    protected function typeFilter($query) {
        if(!(in_array($query,['Bar', 'Cinema', 'Club', 'Library', 'Shop']))) {
            return;
        }
        return ['type','=', $query];
    }

    protected function cityFilter($query) {
        return ['address_city', '=', $query];
    }
}

?>
