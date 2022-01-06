<?php

namespace App\View\Components;

use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class AdminAppLayout extends Component
{
    public $title;
    public $pageHeader;
    public $back;

    public function __construct($title = null, $pageHeader = null, $back = null)
    {
        $this->title = $title;
        $this->pageHeader = $pageHeader;
        $this->back = $back;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        App::setLocale(adminUser()->local_lang ?? 'en');

        return view('admin.layouts.app');
    }
}
