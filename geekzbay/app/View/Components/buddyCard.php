<?php

namespace App\View\Components;

use Illuminate\View\Component;

class buddyCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $imgSrc;
    public $imgAlt;
    public $username;
    public $quote;
    public function __construct($imgSrc, $imgAlt, $username, $quote)
    {
        $this->imgSrc = $imgSrc;
        $this->imgAlt = $imgAlt;
        $this->username = $username;
        $this->quote = $quote;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buddy-card');
    }
}
