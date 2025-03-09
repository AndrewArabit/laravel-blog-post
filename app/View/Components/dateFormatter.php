<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;

class dateFormatter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly ?Carbon  $date
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.date-formatter');
    }
}
