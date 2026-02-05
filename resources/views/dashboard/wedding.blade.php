<x-app-layout>
<div class="p-6 max-w-xl">

<h1 class="text-2xl font-bold mb-4">Edit Wedding</h1>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
    {{ session('success') }}
</div>
@endif

<form method="POST"
      action="{{ route('wedding.update') }}"
      enctype="multipart/form-data">
@csrf

<input type="text" name="bride_name"
value="{{ $wedding->bride_name ?? '' }}"
placeholder="Nama Mempelai Wanita"
class="border p-2 w-full mb-2">

<input type="text" name="groom_name"
value="{{ $wedding->groom_name ?? '' }}"
placeholder="Nama Mempelai Pria"
class="border p-2 w-full mb-2">

<input type="text" name="bride_parent"
value="{{ $wedding->bride_parent ?? '' }}"
placeholder="Orang Tua Wanita"
class="border p-2 w-full mb-2">

<input type="text" name="groom_parent"
value="{{ $wedding->groom_parent ?? '' }}"
placeholder="Orang Tua Pria"
class="border p-2 w-full mb-2">

<input type="date" name="date"
value="{{ $wedding->date ?? '' }}"
class="border p-2 w-full mb-2">

<input type="time" name="time"
value="{{ $wedding->time ?? '' }}"
class="border p-2 w-full mb-2">

<input type="text" name="location"
value="{{ $wedding->location ?? '' }}"
placeholder="Lokasi"
class="border p-2 w-full mb-2">

<input type="text" name="maps_link"
value="{{ $wedding->maps_link ?? '' }}"
placeholder="Google Maps Link"
class="border p-2 w-full mb-2">

<textarea name="story"
placeholder="Cerita cinta"
class="border p-2 w-full mb-2">{{ $wedding->story ?? '' }}</textarea>

<select name="theme" class="border p-2 w-full mb-2">
<option value="" selected disabled>--Pilih Template--</option>
<option value="classic" {{ optional($wedding)->theme == 'classic' ? 'selected' : '' }}>
Classic Romantic
</option>
<option value="modern" {{ optional($wedding)->theme == 'modern' ? 'selected' : '' }}>
Modern Minimalist
</option>
<option value="mr&mrs" {{ optional($wedding)->theme == 'mr&mrs' ? 'selected' : '' }}>
Mr & Mrs
</option>
</select>

<!-- <input type="text" name="bank_name" value="{{ optional($wedding)->bank_name }}" class="border p-2 w-full mb-2" placeholder="Nama Bank">
<input type="text" name="bank_account" value="{{ optional($wedding)->bank_account }}" class="border p-2 w-full mb-2" placeholder="No Rekening">
<input type="text" name="bank_holder" value="{{ optional($wedding)->bank_holder }}" class="border p-2 w-full mb-2" placeholder="Atas Nama"> -->

<label class="block mb-1 font-semibold">QRIS</label>
<input type="file" name="qris" class="border p-2 w-full mb-2" class="border p-2 w-full mb-2">
@if(optional($wedding)->qris)
<img src="{{ asset('storage/'.$wedding->qris) }}" class="w-40 mb-2">
@endif

<label class="block mb-1 font-semibold">Gallery Foto</label>
<input type="file" name="gallery[]" multiple class="border p-2 w-full mb-2">

<label class="block mb-1 font-semibold">Musik Background</label>
<input type="file" name="music" class="mb-4" class="border p-2 w-full mb-2">

@if(optional($wedding)->music_url)
<p class="text-sm text-gray-500 mb-2">
Musik saat ini: {{ optional($wedding)->music_url}}
</p>
@endif

<button class="bg-blue-500 text-white px-4 py-2">
Save Wedding
</button>

</form>
</div>
</x-app-layout>