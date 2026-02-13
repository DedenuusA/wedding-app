<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wedding;
use App\Models\Bank;
use App\Models\Rsvps;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
   public function show($slug)
    {   
        $wedding = Wedding::with('banks')->where('slug', $slug)->firstOrFail();
        $view = 'themes.' . $wedding->theme . '.index';
        $guestName = request('to');
        $messages = Rsvps::where('kolom2', $slug)->whereNotNull('message')
            ->latest()
            ->take(20)
            ->get();

        return view($view, compact('wedding', 'messages','guestName'));
    }
}
