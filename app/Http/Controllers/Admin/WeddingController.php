<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wedding;
use App\Models\MasterBank;
use App\Models\Bank;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WeddingController extends Controller
{
    public function edit()
    {
        $wedding = Wedding::where('kolom3', Auth::user()->id)->first();
        $banks = MasterBank::all();
        return view('dashboard.wedding', compact('wedding','banks'));
    }

    public function update(Request $request)
    {
        $wedding = Wedding::where('kolom3', Auth::user()->id)->first();
  
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
        // upload gallery
        if ($request->hasFile('gallery')) {
            $galleryPaths = [];

            foreach ($request->file('gallery') as $photo) {
                $galleryPaths[] = $photo->store('gallery', 'public');
            }

            $data['kolom2'] = json_encode($galleryPaths);
        }
        // upload qris
        if ($request->hasFile('qris')) {
            $data['kolom1'] = $request->file('qris')->store('qris', 'public');
        }
        $data['kolom3'] = Auth::check() ? Auth::id() : null;
        // auto slug
        $data['slug'] = Str::slug(
            $data['bride_name'].'-'.$data['groom_name']
        );
        $wedding->update($data);
        
        $wedding->banks()->delete();
        if ($request->banks) {
            foreach ($request->banks['name'] as $i => $name) {
                if (!$name) continue;
                $wedding->banks()->create([
                    'bank_name' => $name,
                    'account_number' => $request->banks['number'][$i] ?? '',
                    'account_holder' => $request->banks['holder'][$i] ?? '',
                ]);
            }
        }

        return back()->with('success', 'Wedding updated!');
    }
}