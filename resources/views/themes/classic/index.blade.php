<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/images/favicon1.png" />
    <title>{{ optional($wedding)->bride_name ?? '' }} & {{ optional($wedding)->groom_name ?? '' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .fade-in {
            animation: fadeIn 1.2s ease forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }
    </style>

</head>

<body class="bg-pink-50 text-gray-800">

    <!-- tombol musik -->
    <button onclick="playMusic()"
        class="fixed bottom-4 right-4 bg-pink-500 text-white p-4 rounded-full shadow-xl hover:bg-pink-600 transition float z-50">
        🎵
    </button>

    <audio id="bgmusic" loop>
        @if (optional($wedding)->music_url)
            <source src="{{ asset('storage/' . $wedding->music_url) }}">
        @endif
    </audio>

    <div class="min-h-screen flex flex-col items-center text-center p-6 fade-in">

        {{-- nama tamu --}}
        @if ($guestName)
            <div class="bg-white/80 backdrop-blur p-3 rounded-xl shadow mb-4">
                Kepada Yth: <strong>{{ $guestName }}</strong>
            </div>
        @endif

        {{-- HERO --}}
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 max-w-xl w-full">
            <h3 class="text-black-300">Kami Akan Menikah</h3>
            <h1 class="text-5xl font-bold mb-3 text-pink-600">
                {{ optional($wedding)->bride_name ?? '' }}
                <span class="text-gray-400">&</span>
                {{ optional($wedding)->groom_name ?? '' }}
            </h1>

            <p class="text-gray-600 mb-2">
                Putri dari {{ optional($wedding)->bride_parent ?? '' }}
            </p>

            <p class="text-gray-600 mb-4">
                Putra dari {{ optional($wedding)->groom_parent ?? '' }}
            </p>

            <p class="text-lg font-semibold">
                {{ optional($wedding)->date ? \Carbon\Carbon::parse($wedding->date)->format('d F Y') : '' }}
            </p>

            <p class="mb-4">
                Pukul {{ optional($wedding)->time ? \Carbon\Carbon::parse($wedding->time)->format('H:i') : '' }}
            </p>

            <p class="font-semibold text-pink-600">
                {{ optional($wedding)->location ?? '' }}
            </p>

        </div>

        {{-- cerita --}}
        @if (optional($wedding)->story)
            <div class="max-w-xl mb-8 bg-white p-6 rounded-2xl shadow fade-in">
                <h2 class="text-2xl font-semibold mb-3 text-pink-600">Cerita Cinta</h2>
                <p>{{ $wedding->story }}</p>
            </div>
        @endif

        {{-- gallery --}}
        @if (!empty(json_decode(optional($wedding)->kolom2 ?? '[]')))
            <h2 class="text-2xl font-semibold mb-4 text-pink-600">Galeri</h2>

            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-8 max-w-4xl">

                @foreach (json_decode(optional($wedding)->kolom2 ?? '[]') as $img)
                    <div class="overflow-hidden rounded-xl shadow-lg hover:scale-110 transition duration-500">
                        <img src="{{ asset('storage/' . $img) }}" class="w-full h-40 object-cover">
                    </div>
                @endforeach

            </div>
        @endif

        {{-- maps --}}
        @if (optional($wedding)->maps_link)
            <div class="w-full max-w-xl mb-8 rounded-2xl overflow-hidden shadow-xl">
                <iframe src="{{ $wedding->maps_link }}" width="100%" height="320" style="border:0;"
                    loading="lazy"></iframe>
            </div>
        @endif

        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-10 items-start">
            {{-- QRIS --}}
            @if (optional($wedding)->kolom1)
                <div class="bg-white p-6 rounded-2xl shadow mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-pink-600">QRIS</h2>
                    <img src="{{ asset('storage/' . $wedding->kolom1) }}" class="w-44 mx-auto rounded-xl shadow">
                    <p class="text-sm text-gray-600 mt-2">Scan untuk memberikan hadiah</p>
                </div>
            @endif

            @if ($wedding->banks->count())
                <div class="bg-white p-6 rounded-2xl shadow mb-8">

                    <h2 class="text-2xl font-semibold mb-6 text-pink-600">
                        Hadiah Pernikahan
                    </h2>

                    <div class="space-y-4">

                        @foreach ($wedding->banks as $bank)
                            @php
                                $master = \App\Models\MasterBank::where('name', $bank->bank_name)->first();
                                $logo = optional($master)->logo;
                            @endphp

                            <div class="border rounded-xl p-4 flex items-center gap-4 shadow-sm">

                                {{-- Logo --}}
                                @if ($logo)
                                    <img src="{{ asset('storage/' . $logo) }}" class="w-12 h-12 object-contain">
                                @endif

                                {{-- Info rekening --}}
                                <div class="flex-1">
                                    <p class="font-bold text-gray-800">{{ $bank->bank_name }}</p>
                                    <p class="text-lg tracking-widest">{{ $bank->account_number }}</p>
                                    <p class="text-sm text-gray-600">
                                        a.n {{ $bank->account_holder }}
                                    </p>
                                </div>

                                {{-- Copy button --}}
                                <button onclick="copyText('{{ $bank->account_number }}')"
                                    class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-lg text-sm">
                                    Salin
                                </button>

                            </div>
                        @endforeach

                    </div>
                </div>
        </div>
        @endif



        {{-- RSVP --}}
        @if (session('success'))
            <div class="bg-blue-100 text-blue-700 p-3 mb-4 rounded-xl shadow">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('rsvp.store') }}"
            class="w-full max-w-xl mb-12 bg-white p-8 rounded-2xl shadow-xl">

            @csrf

            <input type="hidden" name="wedding_slug" value="{{ optional($wedding)->slug ?? '' }}">

            <input type="text" name="name" placeholder="Nama" class="border p-3 w-full mb-3 rounded-xl" required>

            <select name="attendance" class="border p-3 w-full mb-3 rounded-xl" required>
                <option value="">Konfirmasi Kehadiran</option>
                <option value="hadir">Hadir</option>
                <option value="tidak_hadir">Tidak Hadir</option>
            </select>

            <input type="number" name="total_guest" placeholder="Jumlah tamu"
                class="border p-3 w-full mb-3 rounded-xl">

            <textarea name="message" placeholder="Ucapan" class="border p-3 w-full mb-3 rounded-xl"></textarea>

            <button class="bg-pink-500 text-white px-4 py-3 w-full rounded-xl hover:bg-pink-600 transition text-lg">
                Kirim RSVP
            </button>

        </form>

        {{-- buku ucapan --}}
        <div class="w-full max-w-xl">

            <h2 class="text-2xl font-bold mb-4 text-center text-pink-600">
                Buku Ucapan
            </h2>

            <div class="space-y-4 max-h-96 overflow-y-auto pr-2">
                @forelse($messages as $msg)
                    <div class="bg-white p-4 mb-3 rounded-xl shadow hover:shadow-lg transition">
                        <p class="font-semibold">{{ $msg->kolom1 ?? 'Tamu' }}</p>
                        <p class="text-sm text-gray-600">{{ $msg->message }}</p>
                    </div>
                @empty
                    <p class="text-center text-gray-500">Belum ada ucapan 😄</p>
                @endforelse
            </div>
        </div>

    </div>

    <script>
        function playMusic() {
            var music = document.getElementById('bgmusic');
            if (music.paused) music.play();
            else music.pause();
        }

        function copyText(text) {

            if (navigator.clipboard && window.isSecureContext) {
                // modern way
                navigator.clipboard.writeText(text)
                    .then(() => alert("Nomor rekening disalin!"))
                    .catch(() => fallbackCopy(text));

            } else {
                // fallback
                fallbackCopy(text);
            }
        }

        function fallbackCopy(text) {
            let textarea = document.createElement("textarea");
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);
            alert("Nomor rekening disalin!");
        }
    </script>

</body>

</html>
