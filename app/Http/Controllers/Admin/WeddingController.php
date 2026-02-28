<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wedding;
use App\Models\MasterBank;
use App\Models\Bank;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class WeddingController extends Controller
{
    public function edit()
    {
        $wedding = Wedding::where('kolom3', Auth::user()->id)->first();
        $banks = MasterBank::all();
        return view('dashboard.wedding', compact('wedding', 'banks'));
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

        if ($request->hasFile('music')) {
            // Hapus lama jika ada (public_id)
            if ($wedding->music_url) {
                Cloudinary::destroy($wedding->music_url, [
                    'resource_type' => 'video',
                ]);
            }

            $uploadMusic = Cloudinary::upload($request->file('music')->getRealPath(), [
                'folder' => 'wedding_music',
                'resource_type' => 'video',
            ]);

            // Simpan public_id
            $data['music_url'] = $uploadMusic->getPublicId();
        }

        if ($request->hasFile('gallery')) {
            // Hapus gallery lama jika ada
            if ($wedding->kolom2) {
                $oldGallery = json_decode($wedding->kolom2, true);

                foreach ($oldGallery as $oldPublicId) {
                    Cloudinary::destroy($oldPublicId);
                }
            }

            $galleryPublicIds = [];

            foreach ($request->file('gallery') as $photo) {
                $uploadImage = Cloudinary::upload($photo->getRealPath(), ['folder' => 'wedding_gallery']);

                $galleryPublicIds[] = $uploadImage->getPublicId();
            }

            $data['kolom2'] = json_encode($galleryPublicIds);
        }

        if ($request->hasFile('qris')) {
            // Hapus lama jika ada
            if ($wedding->kolom1) {
                Cloudinary::destroy($wedding->kolom1);
            }

            $uploadedFileUrl = Cloudinary::upload($request->file('qris')->getRealPath(), ['folder' => 'wedding_qris']);

            $data['kolom1'] = $uploadedFileUrl->getPublicId();
        }

        // -----------------------------
        // Data tambahan
        // -----------------------------
        $data['kolom3'] = Auth::check() ? Auth::id() : null;
        $data['slug'] = Str::slug($data['bride_name'] . '-' . $data['groom_name']);

        $wedding->update($data);

        // -----------------------------
        // Bank
        // -----------------------------
        $wedding->banks()->delete();
        if ($request->banks) {
            foreach ($request->banks['name'] as $i => $name) {
                if (!$name) {
                    continue;
                }
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
