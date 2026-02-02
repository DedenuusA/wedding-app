<x-app-layout>
<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">
        Daftar Ucapan Tamu
    </h1>

    <table class="w-full border bg-white rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">Kehadiran</th>
                <th class="p-2 border">Jumlah</th>
                <th class="p-2 border">Ucapan</th>
                <th class="p-2 border">Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @foreach($rsvps as $rsvp)
            <tr>
                <td class="p-2 border">{{ $rsvp->kolom1 }}</td>
                <td class="p-2 border">
                    {{ $rsvp->attendance }}
                </td>
                <td class="p-2 border">{{ $rsvp->total_guest }}</td>
                <td class="p-2 border">{{ $rsvp->message }}</td>
                <td class="p-2 border">
                    {{ $rsvp->created_at->format('d M Y H:i') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $rsvps->links() }}
    </div>

</div>
</x-app-layout>