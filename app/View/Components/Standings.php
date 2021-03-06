<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Standings extends Component
{
    public $teamStats;
    public $matchOrder;
    public $matches;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($teamStats, $matchOrder, $matches)
    {
        $this->teamStats = $teamStats;
        $this->matchOrder = $matchOrder;
        $this->matches = $matches;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.standings');
    }
}
