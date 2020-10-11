<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TeamShow extends Component
{
    public $teamMatches;
    public $team;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($team, $teamMatches)
    {
        $this->team = $team;
        $this->teamMatches = $teamMatches;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.team-show');
    }
}
