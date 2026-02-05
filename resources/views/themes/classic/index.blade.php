<!DOCTYPE html>
<html>
<head>
    <title>{{ optional($wedding)->groom_name ?? 'Groom' }} & {{ optional($wedding)->bride_name ?? 'Bride' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800">

<!-- tombol musik -->
<button onclick="playMusic()"
class="fixed bottom-4 right-4 bg-pink-500 text-white p-3 rounded-full shadow-lg hover:bg-pink-600 transition">
▶ Musik
</button>

<audio id="bgmusic" loop>
    @if(optional($wedding)->music_url)
    <source src="{{ asset('storage/'.$wedding->music_url) }}">
    @endif
</audio>

<div class="min-h-screen flex flex-col items-center text-center p-6">

    {{-- nama tamu --}}
    @if($guestName)
    <h3 class="text-xl mb-2">
        Kepada Yth: <strong>{{ $guestName }}</strong>
    </h3>
    @endif

    {{-- nama pasangan --}}
    <h1 class="text-4xl font-bold mb-2">
        {{ optional($wedding)->groom_name ?? '' }} ❤️ {{ optional($wedding)->bride_name ?? '' }}
    </h1>

    <p class="mb-1">
        Putra dari {{ optional($wedding)->groom_parent ?? '' }}
    </p>

    <p class="mb-4">
        Putri dari {{ optional($wedding)->bride_parent ?? '' }}
    </p>

    {{-- tanggal --}}
    <p class="text-lg mb-1">
        {{ optional($wedding)->date ? \Carbon\Carbon::parse($wedding->date)->format('d F Y') : '' }}
    </p>

    <p class="mb-4">
        Pukul {{ optional($wedding)->time ? \Carbon\Carbon::parse($wedding->time)->format('H:i') : '' }}
    </p>

    <p class="mb-6 font-semibold">
        {{ optional($wedding)->location ?? '' }}
    </p>

    {{-- cerita --}}
    @if(optional($wedding)->story)
    <div class="max-w-md mb-8 bg-white p-4 rounded shadow">
        <p>{{ $wedding->story }}</p>
    </div>
    @endif

     {{-- Gallery Foto --}}
    @if(!empty(json_decode(optional($wedding)->kolom2 ?? '[]')))
    <h2 class="text-2xl font-semibold mb-4">Gallery</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 mb-6">
        @foreach(json_decode(optional($wedding)->kolom2 ?? '[]') as $img)
        <div class="overflow-hidden rounded shadow-lg hover:scale-105 transform transition">
            <img src="{{ asset('storage/'.$img) }}" class="w-full h-32 object-cover">
        </div>
        @endforeach
    </div>
    @endif

    {{-- maps --}}
    @if(optional($wedding)->maps_link)
    <div class="w-full max-w-md mb-8 rounded overflow-hidden shadow-lg">
        <iframe
            src="{{ $wedding->maps_link }}"
            width="100%"
            height="300"
            style="border:0;"
            allowfullscreen
            loading="lazy">
        </iframe>
    </div>
    @endif

    {{-- QRIS --}}
    @if(optional($wedding)->kolom1)
    <h2 class="text-2xl font-semibold mb-4">QRIS</h2>
    <div class="mb-6">
        <img src="{{ asset('storage/'.$wedding->kolom1) }}" class="w-40 mx-auto rounded shadow-lg">
        <p class="text-sm text-gray-600 mt-2">Scan untuk memberikan hadiah</p>
    </div>
    @endif

    {{-- RSVP --}}
    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('rsvp.store') }}" class="w-full max-w-md mb-12 bg-white p-6 rounded shadow-lg">
        @csrf

        <input type="text" name="name" placeholder="Nama"
        class="border p-2 w-full mb-2 rounded" required>

        <select name="attendance" class="border p-2 w-full mb-2 rounded" required>
            <option value="">Konfirmasi Kehadiran</option>
            <option value="hadir">Hadir</option>
            <option value="tidak_hadir">Tidak Hadir</option>
        </select>

        <input type="number" name="total_guest" placeholder="Jumlah tamu"
        class="border p-2 w-full mb-2 rounded">

        <textarea name="message" placeholder="Ucapan"
        class="border p-2 w-full mb-2 rounded"></textarea>

        <button class="bg-pink-500 text-white px-4 py-2 w-full rounded hover:bg-pink-600 transition">
            Kirim RSVP
        </button>
    </form>

    {{-- buku ucapan --}}
    <div class="mt-12 w-full max-w-md text-left">

        <h2 class="text-2xl font-bold mb-4 text-center">
            Buku Ucapan
        </h2>

        @forelse($messages as $msg)
        <div class="bg-white p-4 mb-3 rounded shadow hover:shadow-md transition">
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
    var music = document.getElementById('bgmusic');
    if(music.paused) {
        music.play();
    } else {
        music.pause();
    }
}
</script>

</body>
</html>