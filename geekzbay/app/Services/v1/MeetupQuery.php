<?php

namespace App\Services\v1;
use Illuminate\Support\Str;

class MeetupQuery extends Query {
    // The parameters one can search through, as well as the query applied by it.
    protected $allowedParams = [
        'name' => 'nameFilter',
        'category' => 'categoryFilter',
        'community' => 'communityFilter',
        'startDate' => 'startDateFilter',
        'endDate' => 'endDateFilter',
    ];

    protected function nameFilter($query) {
        return [Str::of('name')->lower(), 'LIKE', `%$query%`];
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
