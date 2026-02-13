<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ optional($wedding)->bride_name ?? 'Bride' }} &
        {{ optional($wedding)->groom_name ?? 'Groom' }}
    </title>
    <link rel="icon" type="image/png" href="/images/favicon1.png" />

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes fade {
            0% {
                opacity: 0
            }

            100% {
                opacity: 1
            }
        }

        .fade-in {
            animation: fade 1.5s ease forwards;
        }

        @keyframes slide {
            0% {
                transform: scale(1.1)
            }

            100% {
                transform: scale(1)
            }
        }

        .bg-animate {
            animation: slide 8s ease infinite alternate;
        }
    </style>
</head>

<body class="bg-black text-white overflow-x-hidden">

    <!-- MUSIC BUTTON -->
    <button onclick="toggleMusic()" class="fixed bottom-6 right-6 bg-white text-black p-4 rounded-full shadow-lg z-50">
        🎵
    </button>

    <audio id="bgmusic" loop>
        @if (optional($wedding)->music_url)
            <source src="{{ asset('storage/' . $wedding->music_url) }}">
        @endif
    </audio>


    <!-- HERO SLIDER -->
    <section class="relative h-screen w-full overflow-hidden">

        @if (!empty(json_decode(optional($wedding)->kolom2 ?? '[]')))
            @foreach (json_decode(optional($wedding)->kolom2 ?? '[]') as $key => $img)
                <img src="{{ asset('storage/' . $img) }}"
                    class="slide absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 {{ $key == 0 ? 'opacity-100' : 'opacity-0' }} bg-animate">
            @endforeach
        @endif

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center px-6 fade-in">

            @if ($guestName)
                <p class="mb-3 opacity-80">
                    Kepada Yth: <strong>{{ $guestName }}</strong>
                </p>
            @endif

            <p class="text-xl md:text-2xl mb-6 tracking-widest">
                We Are Getting Merried
            </p>
            <h1 class="text-5xl md:text-7xl font-serif mb-4">
                {{ optional($wedding)->bride_name ?? 'Bride' }} &
                {{ optional($wedding)->groom_name ?? 'Groom' }}
            </h1>

            <p class="text-xl md:text-2xl mb-6 tracking-widest">
                Save The Date
            </p>

            <p class="text-lg opacity-90">
                {{ optional($wedding)->date ? \Carbon\Carbon::parse($wedding->date)->format('d F Y') : '' }}
            </p>

            @if (optional($wedding)->bride_parent || optional($wedding)->groom_parent)
                <p class="mt-6 opacity-85 text-sm">
                    Putri dari {{ $wedding->bride_parent ?? '-' }} <br>
                    Putra dari {{ $wedding->groom_parent ?? '-' }}
                </p>
            @endif

        </div>

    </section>

    <!-- STORY -->
    @if (optional($wedding)->story)
        <section class="py-20 bg-white text-gray-800 text-center px-6">
            <h2 class="text-4xl font-serif mb-6">Our Love Story</h2>

            <p class="max-w-2xl mx-auto leading-relaxed">
                {{ $wedding->story }}
            </p>
        </section>
    @endif

    <!-- EVENT -->
    <section class="py-20 bg-rose-100 text-center px-6 text-gray-800">
        <h2 class="text-4xl font-serif mb-8">Wedding Event</h2>

        <div class="max-w-xl mx-auto space-y-3">

            <p class="text-xl font-semibold">
                {{ optional($wedding)->date ? \Carbon\Carbon::parse($wedding->date)->format('d F Y') : '' }}
            </p>

            <p>{{ optional($wedding)->time ?? '' }}</p>

            <p>{{ optional($wedding)->location ?? '' }}</p>

            @if (optional($wedding)->maps_link)
                <a href="#lokasi"
                    class="inline-block mt-4 bg-black text-white px-6 py-3 rounded-full hover:scale-105 transition">
                    View Location
                </a>
            @endif

        </div>
    </section>

    <!-- GALLERY -->
    @if (!empty(json_decode(optional($wedding)->kolom2 ?? '[]')))
        <section class="py-20 bg-black text-center px-6">
            <h2 class="text-4xl font-serif mb-10">Gallery</h2>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 max-w-5xl mx-auto">
                @foreach (json_decode(optional($wedding)->kolom2 ?? '[]') as $img)
                    <img src="{{ asset('storage/' . $img) }}" class="rounded-xl hover:scale-105 transition">
                @endforeach
            </div>
        </section>
    @endif

    <section class="py-20 bg-rose-50 text-gray-800 px-6">

        <h2 class="text-4xl font-serif text-center mb-12">
            Wedding Gift
        </h2>

        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-10 items-start">

            {{-- QRIS --}}
            @if (optional($wedding)->kolom1)
                <div class="text-center">

                    <img src="{{ asset('storage/' . $wedding->kolom1) }}" class="w-64 mx-auto rounded-xl shadow mb-4">

                    <p class="opacity-80">
                        Scan QRIS To Give Gifts
                    </p>

                </div>
            @endif

            {{-- BANK --}}
            @if ($wedding->banks->count())
                <div class="space-y-4">

                    @foreach ($wedding->banks as $bank)
                        @php
                            $master = \App\Models\MasterBank::where('name', $bank->bank_name)->first();
                            $logo = optional($master)->logo;
                        @endphp

                        <div class="bg-white rounded-xl p-5 shadow flex items-center gap-4">

                            @if ($logo)
                                <img src="{{ asset('storage/' . $logo) }}"
                                    class="w-12 h-12 object-contain bg-gray-100 rounded p-1">
                            @endif

                            <div class="flex-1">
                                <p class="font-semibold">{{ $bank->bank_name }}</p>
                                <p class="text-lg font-mono">{{ $bank->account_number }}</p>
                                <p class="text-sm opacity-70">
                                    a.n {{ $bank->account_holder }}
                                </p>
                            </div>

                            <button onclick="copyText('{{ $bank->account_number }}')"
                                class="bg-black text-white px-3 py-1 rounded">
                                Copy
                            </button>

                        </div>
                    @endforeach

                </div>
            @endif

        </div>
    </section>

    @if (optional($wedding)->maps_link)
        <section class="py-20 bg-white px-6 text-center">

            <h2 class="text-4xl font-serif mb-8 text-gray-800" id="lokasi">
                Event Location
            </h2>

            <div class="max-w-4xl mx-auto rounded-xl overflow-hidden shadow">

                <iframe src="{{ $wedding->maps_link }}" width="100%" height="350" style="border:0;" allowfullscreen
                    loading="lazy">
                </iframe>

            </div>

        </section>
    @endif

    <!-- RSVP -->
    <section class="py-20 bg-rose-50 text-gray-800 px-6">
        @if (session('success'))
            <div class="bg-blue-100 text-blue-700 p-4 mb-6 rounded max-w-xl mx-auto">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('rsvp.store') }}" class="max-w-xl mx-auto space-y-4">

            @csrf
            <input type="hidden" name="wedding_slug" value="{{ $wedding->slug }}">
            <input type="text" name="name" placeholder="Name" class="w-full border p-3 rounded" required>
            <input type="number" name="total_guest" class="w-full border p-3 rounded" placeholder="Number Of Guests">

            <select name="attendance" class="w-full border p-3 rounded" required>
                <option value="">Confirmation of Attendance</option>
                <option value="hadir">Preset</option>
                <option value="tidak_hadir">Not Present</option>
            </select>

            <textarea name="message" placeholder="Message" class="w-full border p-3 rounded"></textarea>

            <button class="w-full bg-black text-white p-3 rounded hover:opacity-80 transition">
                Send RSVP
            </button>

        </form>

    </section>

    <!-- BUKU UCAPAN -->
    <section class="py-20 bg-gray-100 px-6 text-gray-800">

        <h2 class="text-4xl font-serif text-center mb-10">Greeting Book</h2>

        <div class="max-w-xl mx-auto">
            <div class="space-y-4 max-h-96 overflow-y-auto pr-2">

                @forelse($messages as $msg)
                    <div class="bg-white p-4 rounded shadow">
                        <p class="font-semibold">{{ $msg->kolom1 }}</p>
                        <p class="text-sm opacity-80">{{ $msg->message }}</p>
                    </div>
                @empty
                    <p class="text-center opacity-60">No Words Yet 😄</p>
                @endforelse
                <div>
                </div>
    </section>

    <!-- FOOTER -->
    <section class="py-10 bg-gray-900 text-center text-sm opacity-80">
        Made with ❤️ Wedding Digital
    </section>

    <script>
        let slides = document.querySelectorAll('.slide');
        let index = 0;

        if (slides.length > 0) {
            setInterval(() => {
                slides[index].style.opacity = 0;
                index = (index + 1) % slides.length;
                slides[index].style.opacity = 1;
            }, 4000);
        }

        function toggleMusic() {
            const music = document.getElementById('bgmusic');
            if (music.paused) {
                music.play();
            } else {
                music.pause();
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
    </script>

</body>

</html>
