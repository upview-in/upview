<?php

namespace App\View\Components\App;

use App\Http\Controllers\User\PlansController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public $title;
    public $pageHeader;

    public function __construct($title = null, $pageHeader = null)
    {
        $this->title = $title;
        $this->pageHeader = $pageHeader;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        App::setLocale(Auth::user()->local_lang ?? 'en');
        PlansController::validatePlan();

        return view('layouts.app');
    }
}
