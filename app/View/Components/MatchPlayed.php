<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MatchPlayed extends Component
{
    public $matches;
    public $teamStatsOrder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($matches, $teamStatsOrder)
    {
        $this->matches = $matches;
        $this->teamStatsOrder = $teamStatsOrder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.match-played');
    }
}
