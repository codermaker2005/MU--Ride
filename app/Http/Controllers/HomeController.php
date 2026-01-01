<?php

namespace App\Http\Controllers;

use App\Models\Ride;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'rides' => Ride::where('status', 'approved')
                ->with('user')   // ✅ IMPORTANT
                ->latest()
                ->get(),
        ]);
    }
}
