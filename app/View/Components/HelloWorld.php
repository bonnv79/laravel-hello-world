<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HelloWorld extends Component
{
    public $title; // new property
    public $postId;// new property
    public $image;// new property
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = '', $postId = '', $image = '')
    {
        $this->title=$title;
        $this->postId=$postId;
        $this->image=$image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.hello-world');
    }
}