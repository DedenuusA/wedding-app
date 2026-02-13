<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ optional($wedding)->bride_name }} &
        {{ optional($wedding)->groom_name }}
    </title>
    <link rel="icon" type="image/png" href="/images/favicon1.png" />

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* bunga jatuh */
        .flower {
            position: fixed;
            top: -10%;
            font-size: 24px;
            animation: fall linear infinite;
            opacity: .8;
            pointer-events: none;
        }

        @keyframes fall {
            0% {
                transform: translateY(-10%) rotate(0deg);
            }

            100% {
                transform: translateY(110vh) rotate(360deg);
            }
        }

        .fade-in {
            animation: fade 1.5s ease forwards;
        }

        @keyframes fade {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-gradient-to-b from-rose-50 to-white text-gray-800 overflow-x-hidden">
    <button onclick="toggleMusic()" id="musicBtn"
        class="fixed bottom-4 right-4 bg-pink-500 text-white p-3 rounded-full shadow-lg hover:bg-pink-600 transition z-50">
        🎵
    </button>

    <audio id="bgmusic" loop>
        @if (optional($wedding)->music_url)
            <source src="{{ asset('storage/' . $wedding->music_url) }}">
        @endif
    </audio>


    <!-- bunga container -->
    <div id="flowers"></div>

    <!-- HERO -->
    <section class="min-h-screen flex flex-col justify-center items-center text-center px-6 fade-in">

        @if ($guestName)
            <p class="mb-3 text-lg opacity-80">
                Kepada Yth: <strong>{{ $guestName }}</strong>
            </p>
        @endif

        <h1 class="text-5xl md:text-7xl font-serif mb-4 text-rose-700">
            {{ optional($wedding)->bride_name ?? 'Bride' }} &
            {{ optional($wedding)->groom_name ?? 'Groom' }}
        </h1>

        <p class="text-xl mb-6 tracking-widest">
            We Are Getting Married
        </p>

        <p class="text-lg">
            {{ optional($wedding)->date ? \Carbon\Carbon::parse($wedding->date)->format('d F Y') : '' }}
        </p>

    </section>

    <section class="py-16 bg-white text-center px-6 fade-in">

        <h2 class="text-3xl font-serif mb-6 text-rose-700">
            With Love
        </h2>

        <div class="max-w-2xl mx-auto grid md:grid-cols-2 gap-6">

            <div class="bg-rose-50 p-6 rounded shadow">
                <h3 class="font-bold text-lg">
                    {{ optional($wedding)->bride_name }}
                </h3>
                <p>Putri dari</p>
                <p>{{ optional($wedding)->bride_parent }}</p>
            </div>

            <div class="bg-rose-50 p-6 rounded shadow">
                <h3 class="font-bold text-lg">
                    {{ optional($wedding)->groom_name }}
                </h3>
                <p>Putra dari</p>
                <p>{{ optional($wedding)->groom_parent }}</p>
            </div>

        </div>
    </section>


    <!-- STORY -->
    @if (optional($wedding)->story)
        <section class="py-20 bg-white text-center px-6 fade-in">
            <h2 class="text-4xl font-serif mb-6 text-rose-700">
                Our Love Story
            </h2>

            <p class="max-w-2xl mx-auto leading-relaxed">
                {{ $wedding->story }}
            </p>
        </section>
    @endif

    <!-- EVENT -->
    <section class="py-20 bg-rose-100 text-center px-6 fade-in">
        <h2 class="text-4xl font-serif mb-8 text-rose-800">
            Wedding Event
        </h2>

        <div class="max-w-xl mx-auto space-y-3">

            <p class="text-xl font-semibold">
                {{ optional($wedding)->date ? \Carbon\Carbon::parse($wedding->date)->format('d F Y') : '' }}
            </p>

            <p>{{ optional($wedding)->time }}</p>

            <p>{{ optional($wedding)->location }}</p>

            @if (optional($wedding)->maps_link)
                <div class="mt-6">
                    <iframe src="{{ $wedding->maps_link }}" width="100%" height="350" style="border:0;"
                        allowfullscreen loading="lazy" class="rounded shadow">
                    </iframe>
                </div>
            @endif


        </div>
    </section>

    <!-- GALLERY -->
    @if (!empty(json_decode(optional($wedding)->kolom2 ?? '[]')))
        <section class="py-20 bg-white text-center px-6 fade-in">
            <h2 class="text-4xl font-serif mb-10 text-rose-700">
                Gallery
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 max-w-5xl mx-auto">
                @foreach (json_decode(optional($wedding)->kolom2 ?? '[]') as $img)
                    <img src="{{ asset('storage/' . $img) }}" class="rounded-xl shadow hover:scale-105 transition">
                @endforeach
            </div>
        </section>
    @endif

    <section class="py-20 bg-rose-100 text-center px-6 fade-in">

        <h2 class="text-4xl font-serif mb-10 text-rose-800">
            Wedding Gift
        </h2>

        <div class="max-w-4xl mx-auto grid md:grid-cols-2 gap-8">

            <!-- QRIS -->
            @if (optional($wedding)->kolom1)
                <div class="bg-white p-6 rounded shadow flex flex-col items-center">
                    <h3 class="font-bold mb-4">QRIS</h3>
                    <img src="{{ asset('storage/' . $wedding->kolom1) }}" class="w-64 rounded">
                    <p class="mt-3 text-sm opacity-70">Scan QRIS To Give Gifts</p>
                </div>
            @endif


            <!-- BANK LIST -->
            @if ($wedding->banks->count())
                <div class="space-y-4">

                    @foreach ($wedding->banks as $bank)
                        @php
                            $master = \App\Models\MasterBank::where('name', $bank->bank_name)->first();
                            $logo = optional($master)->logo;
                        @endphp

                        <div class="bg-white p-4 rounded shadow flex items-center gap-4">

                            @if ($logo)
                                <img src="{{ asset('storage/' . $logo) }}" class="w-12 h-12 object-contain">
                            @endif

                            <div class="flex-1 text-left">
                                <p class="font-semibold">{{ $bank->bank_name }}</p>
                                <p class="tracking-widest">{{ $bank->account_number }}</p>
                                <p class="text-sm opacity-70">
                                    a.n {{ $bank->account_holder }}
                                </p>
                            </div>

                            <button onclick="copyText('{{ $bank->account_number }}')"
                                class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded text-sm">
                                Copy
                            </button>

                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>



    <!-- RSVP -->
    <section class="py-20 bg-rose-50 text-center px-6 fade-in">

        <h2 class="text-4xl font-serif mb-8 text-rose-700">
            RSVP
        </h2>

        @if (session('success'))
            <div class="bg-blue-100 text-blue-700 p-4 mb-6 rounded max-w-xl mx-auto">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('rsvp.store') }}" class="max-w-xl mx-auto space-y-4">
            @csrf
            <input type="hidden" name="wedding_slug" value="{{ optional($wedding)->slug ?? '' }}">
            <input type="text" name="name" placeholder="Name" class="w-full border p-3 rounded">

            <select name="attendance" class="w-full border p-3 rounded">
                <option value="">Konfirmasi Kehadiran</option>
                <option value="hadir">Hadir</option>
                <option value="tidak_hadir">Tidak Hadir</option>
            </select>

            <input type="number" name="total_guest" placeholder="Number Of Guests" class="w-full border p-3 rounded">

            <textarea name="message" placeholder="Message" class="w-full border p-3 rounded"></textarea>

            <button class="w-full bg-rose-600 text-white p-3 rounded hover:opacity-80 transition">
                Send RSVP
            </button>

        </form>

    </section>

    <!-- BUKU UCAPAN -->
    <section class="py-20 bg-white px-6 fade-in">

        <h2 class="text-4xl font-serif text-center mb-10 text-rose-700">
            Greeting Book
        </h2>

        <div class="max-w-xl mx-auto space-y-4 max-h-80 overflow-y-auto pr-2">
            @forelse($messages as $msg)
                <div class="bg-rose-50 p-4 rounded shadow">
                    <p class="font-semibold">{{ $msg->kolom1 ?? 'Tamu' }}</p>
                    <p class="text-sm opacity-80">{{ $msg->message }}</p>
                </div>
            @empty
                <p class="text-center opacity-60">Belum ada ucapan 🌸</p>
            @endforelse

        </div>
    </section>

    <!-- FOOTER -->
    <section class="py-10 bg-rose-700 text-white text-center text-sm">
        Made with ❤️ Wedding Digital
    </section>

    <script>
        /* generate bunga jatuh */
        const flowers = document.getElementById("flowers");

        for (let i = 0; i < 25; i++) {
            let f = document.createElement("div");
            f.className = "flower";
            f.innerHTML = "🌸";
            f.style.left = Math.random() * 100 + "vw";
            f.style.animationDuration = (5 + Math.random() * 5) + "s";
            f.style.fontSize = (16 + Math.random() * 20) + "px";
            flowers.appendChild(f);
        }

        function toggleMusic() {
            const music = document.getElementById('bgmusic');
            const btn = document.getElementById('musicBtn');

            if (music.paused) {
                music.play().catch(() => {});
                btn.innerHTML = "⏸";
            } else {
                music.pause();
                btn.innerHTML = "🎵";
            }
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
