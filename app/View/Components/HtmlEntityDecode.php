<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HtmlEntityDecode extends Component
{
    public $value; // new property
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value = '')
    {
        $this->value=$value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.html-entity-decode');
    }
}