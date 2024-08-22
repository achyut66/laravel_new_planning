<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\NagarAnugaman;
use App\Models\WardAnugaman;
use Illuminate\Support\Facades\DB; // Import the DB facade

class DashboardLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $countward = WardAnugaman::select('darta_no', DB::raw('count(*) as count'))
            ->groupBy('darta_no')
            ->get();
        $countnagar = NagarAnugaman::select('darta_no', DB::raw('count(*) as count'))
            ->groupBy('darta_no')
            ->get();
        return view('components.dashboard-layout', compact('countward', 'countnagar'));
    }
}
