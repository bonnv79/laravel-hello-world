<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Menu extends Component
{
    public $search; // new property
    public $autofocus; // new property
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($search = '', $autofocus = false)
    {
        $this->search=$search;
        $this->autofocus=$autofocus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu');
    }
}