<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $campaigns = Campaign::orderBy('created_at', 'desc')->limit(4)->paginate(4);
        return view('main', [
            'campaigns' => $campaigns
        ]);
    }
}
