<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Login extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $logintxt;

    public function __construct($logintxt)
    {
        $this->logintxt = $logintxt;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.login');
    }
}
