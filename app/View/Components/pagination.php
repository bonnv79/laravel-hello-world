<?php

namespace App\View\Components;

use Illuminate\View\Component;

class pagination extends Component
{
    public $total; // new property
    public $size; // new property
    public $pageSize; // new property
    public $currentPage; // new property
    public $search; // new property
    public $sort; // new property
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($total =0, $size = 0, $pageSize = 0, $currentPage = 1, $search = '', $sort = '')
    {
        $this->total=$total;
        $this->size=$size;
        $this->pageSize=$pageSize;
        $this->currentPage=$currentPage;
        $this->search=$search;
        $this->sort=$sort;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pagination');
    }
}