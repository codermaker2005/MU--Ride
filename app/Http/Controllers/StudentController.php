<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function dashboard()
    {
        return view('student.dashboard', [
            'rides' => Ride::where('user_id', Auth::id())->latest()->get()
        ]);
    }

    public function storeRide(Request $request)
    {
        $request->validate([
            'from' => 'required|string|max:255',
            'to_block' => 'required|in:Block A,Block B,Block C',
            'time' => 'required|date',
            'seats' => 'required|integer|min:1',
        ]);

        $time = Carbon::parse($request->time);

        // ❌ weekends
        if ($time->isWeekend()) {
            return back()->withErrors('Rides allowed only Monday to Friday.');
        }

        // ❌ outside 8–15
        if ($time->hour < 8 || $time->hour >= 15) {
            return back()->withErrors('Rides allowed only between 08:00 and 15:00.');
        }

        Ride::create([
            'user_id' => Auth::id(),
            'from' => $request->from,
            'to_block' => $request->to_block,
            'time' => $request->time,
            'seats' => $request->seats,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Ride submitted for admin approval.');
    }
}
