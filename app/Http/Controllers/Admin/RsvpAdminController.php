<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rsvps;
use App\Models\Wedding;
use Illuminate\Support\Facades\Auth;

class RsvpAdminController extends Controller
{
    public function index()
    {
        $rsvps = Rsvps::where('kolom3', Auth::user()->id)->latest()->paginate(10);

        return view('dashboard.rspvs', compact('rsvps'));
    }

    public function kirimwa()
    {
        return view('dashboard.whatsapp');
    }
}