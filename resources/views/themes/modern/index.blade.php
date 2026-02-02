<!DOCTYPE html>
<html>
<head>
<title>{{ $wedding->groom_name }} & {{ $wedding->bride_name }}</title>
<script src="https://cdn.tailwindcss.com"></script>

<style>
body { scroll-behavior: smooth; }
.glass {
background: rgba(255,255,255,0.1);
backdrop-filter: blur(10px);
border: 1px solid rgba(255,255,255,0.2);
}
</style>
</head>

<body class="bg-black text-white">

<!-- MUSIC -->
<button onclick="playMusic()"
class="fixed bottom-6 right-6 bg-yellow-500 text-black px-4 py-3 rounded-full shadow-xl z-50">
♪ Music
</button>

<audio id="bgmusic" loop>
<source src="{{ asset('storage/'.$wedding->music_url) }}">
</audio>

<!-- HERO -->
<section class="min-h-screen flex flex-col justify-center items-center text-center p-6 bg-gradient-to-b from-black to-gray-900">

@if($guestName)
<p class="mb-3 text-yellow-400">
Dear {{ $guestName }}
</p>
@endif

<h1 class="text-5xl font-bold mb-4 tracking-widest">
{{ $wedding->groom_name }}
<span class="text-yellow-400">&</span>
{{ $wedding->bride_name }}
</h1>

<p class="text-lg opacity-80">
{{ \Carbon\Carbon::parse($wedding->date)->format('d F Y') }}
</p>

<a href="#details"
class="mt-8 border border-yellow-400 px-6 py-3 hover:bg-yellow-400 hover:text-black transition">
View Invitation
</a>

</section>

<!-- DETAILS -->
<section id="details" class="py-20 px-6 max-w-3xl mx-auto text-center">

<h2 class="text-3xl mb-6 text-yellow-400">Wedding Details</h2>

<div class="glass p-6 rounded-xl mb-8">
<p>Putra dari {{ $wedding->groom_parent }}</p>
<p>Putri dari {{ $wedding->bride_parent }}</p>

<p class="mt-4">
Pukul {{ \Carbon\Carbon::parse($wedding->time)->format('H:i') }}
</p>

<p class="font-semibold mt-2">
{{ $wedding->location }}
</p>
</div>

@if($wedding->story)
<div class="glass p-6 rounded-xl mb-10">
<p>{{ $wedding->story }}</p>
</div>
@endif

</section>

<!-- GALLERY -->
<section class="py-16 bg-gray-900 text-center">
<h2 class="text-3xl text-yellow-400 mb-10">Gallery</h2>

<div class="grid grid-cols-2 md:grid-cols-3 gap-4 max-w-4xl mx-auto">
<img src="https://via.placeholder.com/300" class="rounded shadow">
<img src="https://via.placeholder.com/300" class="rounded shadow">
<img src="https://via.placeholder.com/300" class="rounded shadow">
<img src="https://via.placeholder.com/300" class="rounded shadow">
<img src="https://via.placeholder.com/300" class="rounded shadow">
<img src="https://via.placeholder.com/300" class="rounded shadow">
</div>
</section>

<!-- MAP -->
<section class="py-16 text-center">
<h2 class="text-3xl text-yellow-400 mb-6">Location</h2>

<div class="max-w-3xl mx-auto">
<iframe
src="{{ $wedding->maps_link }}"
width="100%"
height="350"
style="border:0;"
allowfullscreen
loading="lazy">
</iframe>
</div>
</section>

<!-- RSVP -->
<section class="py-20 bg-gray-900 px-6 text-center">

<h2 class="text-3xl text-yellow-400 mb-6">RSVP</h2>

@if(session('success'))
<div class="bg-green-700 p-3 mb-4 rounded">
{{ session('success') }}
</div>
@endif

<form method="POST" action="{{ route('rsvp.store') }}"
class="max-w-md mx-auto">
@csrf

<input type="text" name="name"
placeholder="Nama"
class="w-full p-2 mb-2 text-black">

<select name="attendance"
class="w-full p-2 mb-2 text-black">
<option value="">Konfirmasi Kehadiran</option>
<option value="hadir">Hadir</option>
<option value="tidak_hadir">Tidak Hadir</option>
</select>

<textarea name="message"
placeholder="Ucapan"
class="w-full p-2 mb-2 text-black"></textarea>

<button class="bg-yellow-400 text-black px-6 py-2 w-full">
Kirim RSVP
</button>
</form>

</section>

<!-- GUEST BOOK -->
<section class="py-20 px-6 max-w-2xl mx-auto">

<h2 class="text-3xl text-yellow-400 text-center mb-8">
Guest Messages
</h2>

@forelse($messages as $msg)
<div class="glass p-4 mb-4 rounded">
<p class="font-bold">{{ $msg->name }}</p>
<p class="opacity-80">{{ $msg->message }}</p>
</div>
@empty
<p class="text-center opacity-60">Belum ada ucapan</p>
@endforelse

</section>

<script>
function playMusic() {
document.getElementById('bgmusic').play();
}
</script>

</body>
</html>