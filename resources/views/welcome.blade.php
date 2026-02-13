<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/favicon1.png" />
    <title>Wedding Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Header (Login/Register) -->
    <header class="absolute top-0 left-0 w-full z-20 px-6 py-4 flex justify-end gap-4">
        <a href="{{ route('login') }}" class="text-white border border-white px-4 py-2 rounded-full hover:bg-white hover:text-black transition">
            Login
        </a>
        <a href="{{ route('register') }}" class="bg-rose-600 hover:bg-rose-700 px-4 py-2 rounded-full text-white font-semibold transition">
            Register
        </a>
    </header>
    

    <!-- Landing Section -->
   <section class="relative w-full h-screen overflow-hidden">
    <!-- Background image (akan diganti dengan JS) -->
    <img id="bgImage" src="/images/wedding1.jpg" alt="Wedding" class="absolute inset-0 w-full h-full object-cover brightness-75 transition-opacity duration-1000">

    <!-- Overlay gelap -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- Konten tengah -->
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-6">
        <h1 class="text-5xl md:text-7xl font-serif text-white mb-4">
            💍 Wedding Digital
        </h1>
        <h2 class="text-2xl md:text-4xl font-semibold text-white mb-8">
            Buat Undangan Pernikahan Elegan & Modern
        </h2>
        <div class="flex gap-4 flex-wrap justify-center">
            <a href="{{ route('register') }}" 
               class="bg-rose-600 hover:bg-rose-700 px-8 py-4 rounded-full shadow-xl text-lg font-semibold transition animate-float">
                Daftar Gratis Sekarang
            </a>
            <a href="#preview" 
               class="border border-white hover:bg-white hover:text-black px-8 py-4 rounded-full text-lg transition">
                Lihat Demo
            </a>
        </div>
    </div>
</section>
<script>
    // Array gambar
    const images = [
        '/images/wedding1.jpg',
        '/images/wedding2.jpg',
        '/images/wedding5.jpg'
    ];

    let index = 0;
    const bgImage = document.getElementById('bgImage');

    // Fungsi ganti gambar setiap 5 detik
    setInterval(() => {
        index = (index + 1) % images.length; // loop ke awal
        bgImage.style.opacity = 0; // fade out
        setTimeout(() => {
            bgImage.src = images[index];
            bgImage.style.opacity = 1; // fade in
        }, 500); // delay setengah detik untuk efek fade
    }, 5000); // ganti setiap 5 detik
</script>

</body>
</html>
