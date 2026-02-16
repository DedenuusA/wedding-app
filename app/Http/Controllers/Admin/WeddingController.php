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

        
    // -----------------------------
    // Upload Musik ke public/images/music
    // -----------------------------
    if ($request->hasFile('music')) {
        // hapus file lama jika ada
        if ($wedding->music_url && file_exists(public_path('images/'.$wedding->music_url))) {
            unlink(public_path('images/'.$wedding->music_url));
        }

        $file = $request->file('music');
        $filename = 'music/' . time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/music'), $file->getClientOriginalName());
        $data['music_url'] = 'music/' . $file->getClientOriginalName();
    }

    // -----------------------------
    // Upload Gallery ke public/images/gallery
    // -----------------------------
    if ($request->hasFile('gallery')) {
        // hapus gallery lama jika ada
        if ($wedding->kolom2) {
            $oldGallery = json_decode($wedding->kolom2, true);
            foreach ($oldGallery as $oldFile) {
                if (file_exists(public_path('images/'.$oldFile))) {
                    unlink(public_path('images/'.$oldFile));
                }
            }
        }

        $galleryPaths = [];
        foreach ($request->file('gallery') as $photo) {
            $folder = public_path('images/gallery');
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            $filename = time().'_'.$photo->getClientOriginalName();
            $photo->move($folder, $filename);
            $galleryPaths[] = 'gallery/' . $filename;
        }

        $data['kolom2'] = json_encode($galleryPaths);
    }

    // -----------------------------
    // Upload QRIS ke public/images/qris
    // -----------------------------
    if ($request->hasFile('qris')) {
        // hapus file lama jika ada
        if ($wedding->kolom1 && file_exists(public_path('images/'.$wedding->kolom1))) {
            unlink(public_path('images/'.$wedding->kolom1));
        }

        $file = $request->file('qris');
        $folder = public_path('images/qris');
        if (!file_exists($folder)) mkdir($folder, 0777, true);
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move($folder, $filename);
        $data['kolom1'] = 'qris/'.$filename;
    }

    // -----------------------------
    // Data tambahan
    // -----------------------------
    $data['kolom3'] = Auth::check() ? Auth::id() : null;
    $data['slug'] = Str::slug($data['bride_name'].'-'.$data['groom_name']);

    $wedding->update($data);

    // -----------------------------
    // Bank
    // -----------------------------
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