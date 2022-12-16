<?php

namespace App\View\Components\layouts;

use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $fullname;
    public $infoUser;
    public function __construct( $fullname, $infoUser )
    {
        $this->infoUser = $infoUser;
        $this->fullname = $fullname;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.header');
    }
}
