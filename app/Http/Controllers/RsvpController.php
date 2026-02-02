<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rsvps;

class RsvpController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'attendance' => 'required',
        ]);

        Rsvps::create([
            'guest_id' => null, // nanti kita hubungkan ke daftar tamu
            'attendance' => $request->attendance,
            'total_guest' => $request->total_guest ?? 1,
            'message' => $request->message,
            'kolom1' => $request->name,
        ]);

        return back()->with('success', 'Terima kasih sudah konfirmasi!');
    }
}
