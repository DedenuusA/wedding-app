<!DOCTYPE html>
<html>
<head>
    <title>{{ $wedding->groom_name }} & {{ $wedding->bride_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800">

<!-- tombol musik -->
<button onclick="playMusic()"
class="fixed bottom-4 right-4 bg-pink-500 text-white p-3 rounded-full shadow">
▶ Musik
</button>

<audio id="bgmusic" loop>
<source src="{{ asset('storage/'.$wedding->music_url) }}">
</audio>

<div class="min-h-screen flex flex-col items-center text-center p-6">

{{-- nama tamu --}}
@if($guestName)
<h3 class="text-xl mb-2">
Kepada Yth:
<strong>{{ $guestName }}</strong>
</h3>
@endif

{{-- foto dummy --}}
<div class="flex gap-4 my-6">
<img src="https://via.placeholder.com/150"
class="rounded-full shadow">
<img src="https://via.placeholder.com/150"
class="rounded-full shadow">
</div>

{{-- nama pasangan --}}
<h1 class="text-4xl font-bold mb-2">
{{ $wedding->groom_name }} ❤️ {{ $wedding->bride_name }}
</h1>

<p class="mb-1">
Putra dari {{ $wedding->groom_parent }}
</p>

<p class="mb-4">
Putri dari {{ $wedding->bride_parent }}
</p>

{{-- tanggal --}}
<p class="text-lg mb-1">
{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}
</p>

<p class="mb-4">
Pukul {{ \Carbon\Carbon::parse($wedding->time)->format('H:i') }}
</p>

<p class="mb-6 font-semibold">
{{ $wedding->location }}
</p>

{{-- cerita --}}
@if($wedding->story)
<div class="max-w-md mb-8 bg-white p-4 rounded shadow">
<p>{{ $wedding->story }}</p>
</div>
@endif

{{-- maps --}}
<div class="w-full max-w-md mb-8">
<iframe
src="{{ $wedding->maps_link }}"
width="100%"
height="300"
style="border:0;"
allowfullscreen
loading="lazy">
</iframe>
</div>

{{-- RSVP --}}
@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
{{ session('success') }}
</div>
@endif

<form method="POST" action="{{ route('rsvp.store') }}"
class="w-full max-w-md">
@csrf

<input type="text" name="name" placeholder="Nama"
class="border p-2 w-full mb-2" required>

<select name="attendance"
class="border p-2 w-full mb-2" required>
<option value="">Konfirmasi Kehadiran</option>
<option value="hadir">Hadir</option>
<option value="tidak_hadir">Tidak Hadir</option>
</select>

<input type="number" name="total_guest"
placeholder="Jumlah tamu"
class="border p-2 w-full mb-2">

<textarea name="message"
placeholder="Ucapan"
class="border p-2 w-full mb-2"></textarea>

<button class="bg-pink-500 text-white px-4 py-2 w-full rounded">
Kirim RSVP
</button>
</form>

{{-- buku ucapan --}}
<div class="mt-12 w-full max-w-md text-left">

<h2 class="text-xl font-bold mb-4 text-center">
Buku Ucapan
</h2>

@forelse($messages as $msg)
<div class="bg-white p-4 mb-3 rounded shadow">
<p class="font-semibold">
{{ $msg->name ?? 'Tamu' }}
</p>

<p class="text-sm text-gray-600">
{{ $msg->message }}
</p>
</div>
@empty
<p class="text-center text-gray-500">
Belum ada ucapan 😄
</p>
@endforelse

</div>

</div>

<script>
function playMusic() {
document.getElementById('bgmusic').play();
}
</script>

</body>
</html>