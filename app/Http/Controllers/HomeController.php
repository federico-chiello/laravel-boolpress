<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guests.home');
    }

    public function contacts()
    {
        return view('guests.contacts');
    }

    public function contactsSent(Request $request)
    {
        $data = $request->all();
    }
}
