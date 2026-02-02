<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WeddingController extends Controller
{
    public function edit()
    {
        $wedding = Wedding::first();

        return view('dashboard.wedding', compact('wedding'));
    }

    public function update(Request $request)
    {
        $wedding = Wedding::first();

        $data = $request->validate([
            'bride_name' => 'required',
            'groom_name' => 'required',
            'bride_parent' => 'nullable',
            'groom_parent' => 'nullable',
            'date' => 'nullable|date',
            'time' => 'nullable',
            'location' => 'nullable',
            'maps_link' => 'nullable',
            'story' => 'nullable',
            'theme' => 'required',
            'music' => 'nullable|file|mimes:mp3,wav,ogg',
        ]);

        // upload music
        if ($request->hasFile('music')) {
            $path = $request->file('music')->store('music', 'public');
            $data['music_url'] = $path;
        }

        // auto slug
        $data['slug'] = Str::slug(
            $data['groom_name'].'-'.$data['bride_name']
        );

        $wedding->update($data);

        return back()->with('success', 'Wedding updated!');
    }
}