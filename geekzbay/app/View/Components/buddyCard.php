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
    public $self;
    public $addBuddyId;
    public $discordID;
    public function __construct($self, $imgSrc, $imgAlt, $username, $quote, $addBuddyId, $discordID)
    {
        $this->self = $self === 'true';
        $this->imgSrc = $imgSrc;
        $this->imgAlt = $imgAlt;
        $this->username = $username;
        $this->quote = $quote;
        $this->addBuddyId = $addBuddyId;
        $this->discordID = $discordID;
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
