<?php

namespace App\Services\v1;

class MeetupQuery extends Query {
    protected $allowedParams = [
        'name' => 'nameFilter',
        'category' => 'categoryFilter',
        'community' => 'communityFilter',
        'startDate' => 'startDateFilter',
        'endDate' => 'endDateFilter',
    ];

    protected function nameFilter($query) {
        return ['name', 'LIKE', '%' . strtolower($query) . '%'];
    }

    protected function categoryFilter($query) {
        return ['category_id','=', $query];
    }

    protected function communityFilter($query) {
        return ['community_id', '=', $query];
    }

    protected function startDateFilter($query) {
        return ['date','>=', $query];
    }

    protected function endDateFilter($query) {
        return ['date','<=', $query];
    }
}

?>
