<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rsvps;
use App\Models\Wedding;

class RsvpAdminController extends Controller
{
    public function index()
    {
        $rsvps = Rsvps::latest()->paginate(10);

        return view('dashboard.rspvs', compact('rsvps'));
    }

    public function kirimwa()
    {
        return view('dashboard.whatsapp');
    }
}