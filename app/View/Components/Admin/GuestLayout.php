<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class GuestLayout extends Component
{
    public $title;
    public $bodyClasses;

    public function __construct($title = null, $bodyClasses = null)
    {
        $this->title = $title;
        $this->bodyClasses = $bodyClasses;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('admin.layouts.guest');
    }
}
