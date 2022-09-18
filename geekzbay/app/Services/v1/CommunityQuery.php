<?php

namespace App\Services\v1;
use Illuminate\Http\Request;

class CommunityQuery {
    protected $allowedParams = [
        'name' => 'like',
        'category' => 'equals'
    ];

    public function transform(Request $request) {
        $eloQuery = [];

        foreach($this->allowedParams as $param) {

        }
    }
}

?>
