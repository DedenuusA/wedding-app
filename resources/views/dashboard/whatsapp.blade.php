<x-app-layout>
    <div class="mt-6 border p-4 rounded bg-gray-50">

<h2 class="font-bold mb-2">Kirim Undangan WhatsApp</h2>

<input type="text" id="guestName"
placeholder="Nama Tamu"
class="border p-2 w-full mb-2">

<button onclick="sendWA()"
class="bg-pink-500 text-black px-4 py-2 rounded w-full">
Kirim ke WhatsApp
</button>

</div>

<script>
function sendWA() {
    let name = document.getElementById('guestName').value;
    let slug = "{{ $wedding->slug }}";

    let link = "{{ url('/w') }}/" + slug + "?to=" + encodeURIComponent(name);

    let text = `Halo ${name},
Kami mengundang Anda ke acara pernikahan kami:

${link}

Merupakan kehormatan bagi kami jika Anda berkenan hadir.`;

    let wa = "https://wa.me/?text=" + encodeURIComponent(text);

    window.open(wa, '_blank');
}
</script>
</x-app-layout>