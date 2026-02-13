<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rsvps;
use App\Models\Wedding;

class RsvpController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'attendance' => 'required',
        ]);

         $wedding = Wedding::where('slug', $request->wedding_slug)->first();

        if (!$wedding) {
            return back()->with('error', 'Wedding tidak ditemukan');
        }

        Rsvps::create([
            'guest_id' => null, // nanti kita hubungkan ke daftar tamu
            'attendance' => $request->attendance,
            'total_guest' => $request->total_guest ?? 1,
            'message' => $request->message,
            'kolom1' => $request->name,
            'kolom3' => $wedding->kolom3,
            'kolom2' =>$wedding->slug,
        ]);

        return back()->with('success', 'Terima kasih sudah konfirmasi!');
    }
}
