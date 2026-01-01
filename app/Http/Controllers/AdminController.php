<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'rides' => Ride::with('user')->latest()->get()
        ]);
    }

    public function approve(Ride $ride)
    {
        $ride->update(['status' => 'approved']);
        return back();
    }

    public function reject(Ride $ride)
    {
        $ride->update(['status' => 'rejected']);
        return back();
    }
}
