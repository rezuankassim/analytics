<?php

namespace App\Http\Controllers;

use App\Client;
use Carbon\Carbon;
use RezuanKassim\BQAnalytic\Models\BQTable;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard', [
            'clients' => Client::whereBetween('last_logged_at', [Carbon::yesterday()->endOfDay(), Carbon::today()->endOfDay()])->get()
        ]);
    }
}
