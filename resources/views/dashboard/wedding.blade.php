<x-app-layout>
<div class="p-6 max-w-6xl mx-auto">

<h1 class="text-2xl font-bold mb-6">Edit Wedding</h1>

@if(session('success'))
<div class="bg-blue-100 text-blue-700 p-3 mb-4 rounded">
    {{ session('success') }}
</div>
@endif


<form method="POST" action="{{ route('wedding.update') }}" enctype="multipart/form-data">
@csrf

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

<input type="text" name="bride_name"
value="{{ $wedding->bride_name ?? '' }}"
placeholder="Nama Mempelai Wanita"
class="border rounded p-3 w-full">

<input type="text" name="groom_name"
value="{{ $wedding->groom_name ?? '' }}"
placeholder="Nama Mempelai Pria"
class="border rounded p-3 w-full">

<input type="text" name="bride_parent"
value="{{ $wedding->bride_parent ?? '' }}"
placeholder="Orang Tua Wanita"
class="border rounded p-3 w-full">

<input type="text" name="groom_parent"
value="{{ $wedding->groom_parent ?? '' }}"
placeholder="Orang Tua Pria"
class="border rounded p-3 w-full">

<input type="date" name="date"
value="{{ $wedding->date ?? '' }}"
class="border rounded p-3 w-full">

<input type="time" name="time"
value="{{ $wedding->time ?? '' }}"
class="border rounded p-3 w-full">

<input type="text" name="location"
value="{{ $wedding->location ?? '' }}"
placeholder="Lokasi"
class="border rounded p-3 w-full">

<input type="text" name="maps_link"
value="{{ $wedding->maps_link ?? '' }}"
placeholder="Google Maps Link"
class="border rounded p-3 w-full">

</div>

<textarea name="story"
placeholder="Cerita cinta"
class="border rounded p-3 w-full mt-4 h-32">{{ $wedding->story ?? '' }}</textarea>

<select name="theme"
class="border rounded p-3 w-full mt-4">
<option value="" disabled>--Pilih Template--</option>
<option value="classic" {{ optional($wedding)->theme == 'classic' ? 'selected' : '' }}>
Classic Romantic
</option>
<option value="modern" {{ optional($wedding)->theme == 'modern' ? 'selected' : '' }}>
Modern Minimalist
</option>
<option value="mr&mrs" {{ optional($wedding)->theme == 'mr&mrs' ? 'selected' : '' }}>
Mr & Mrs
</option>
<option value="luxury" {{ optional($wedding)->theme == 'luxury' ? 'selected' : '' }}>
Luxury
</option>
<option value="romantic" {{ optional($wedding)->theme == 'romantic' ? 'selected' : '' }}>
Romatic Floral
</option>
</select>

<div class="mt-6">
<label class="block font-semibold mb-1">Gallery Foto</label>
<input type="file" name="gallery[]" multiple class="border rounded p-3 w-full">
</div>

<div class="mt-6">
<label class="block font-semibold mb-1">Musik Background</label>
<input type="file" name="music" class="border rounded p-3 w-full">

@if(optional($wedding)->music_url)
<p class="text-sm text-gray-500 mt-2">
Musik saat ini: {{ optional($wedding)->music_url}}
</p>
@endif
</div>

<div class="mt-6">
<label class="block font-semibold mb-1">QRIS</label>
<input type="file" name="qris" class="border rounded p-3 w-full">

@if(optional($wedding)->qris)
<img src="{{ asset('storage/'.$wedding->qris) }}"
class="w-40 mt-2 rounded shadow">
@endif
</div>

<div class="mt-6">
<h2 class="text-xl font-bold mb-2">Daftar Bank</h2>

<div id="bank-wrapper">
    @foreach($wedding->banks as $bank)
<div class="bank-item border p-3 mb-2 rounded relative">

    <button type="button"
        onclick="removeBank(this)"
        class="absolute top-2 right-2 text-red-500 font-bold">
        ✕
    </button>

    <input type="hidden" name="banks[id][]" value="{{ $bank->id }}">
    <input type="hidden" name="banks[name][]" value="{{ $bank->bank_name }}">

    <div class="bank-select-wrapper relative w-64 mt-6">
        <div class="selected flex items-center border p-2 cursor-pointer">
            <img src="{{ asset('storage/'.$bank->masterbank->logo ?? '') }}"
                 class="bank-logo w-10 h-10 object-contain mr-2"
                 style="display:block;">
            <span class="bank-name">{{ $bank->bank_name }}</span>
        </div>

        <div class="options absolute border bg-white w-full mt-1 hidden z-10 max-h-40 overflow-auto">
            @foreach($banks as $b)
            <div class="option flex items-center p-2 cursor-pointer hover:bg-gray-100"
                data-id="{{ $b->id }}"
                data-name="{{ $b->name }}"
                data-logo="{{ asset('storage/'.$b->logo) }}">
                <img src="{{ asset('storage/'.$b->logo) }}"
                     class="w-10 h-10 object-contain mr-2">
            </div>
            @endforeach
        </div>
    </div>

    <input type="text"
        name="banks[number][]"
        value="{{ $bank->account_number }}"
        placeholder="No Rekening"
        class="border p-2 w-full mb-1 mt-2">

    <input type="text"
        name="banks[holder][]"
        value="{{ $bank->account_holder }}"
        placeholder="Atas Nama"
        class="border p-2 w-full">

</div>
@endforeach

</div>

<button type="button" onclick="addBank()"
class="bg-gray-800 text-white px-4 py-2 rounded mb-4">
+ Tambah Bank
</button>


<button class="mt-8 bg-rose-600 hover:bg-rose-700 text-white px-6 py-3 rounded shadow w-full md:w-auto">
Save Wedding
</button>

</form>
</div>

<script>
   function addBank() {
    let html = `
    <div class="bank-item border p-3 mb-2 rounded relative">

        <button type="button"
            onclick="removeBank(this)"
            class="absolute top-2 right-2 text-red-500 font-bold">
            ✕
        </button>

        <!-- Hidden input untuk simpan ID bank -->
        <input type="hidden" name="banks[id][]" value="">
        <!-- Hidden input untuk simpan Nama bank -->
        <input type="hidden" name="banks[name][]" value="">

        <div class="bank-select-wrapper relative w-64 mt-6">
            <div class="selected flex items-center border p-2 cursor-pointer">
                <img src="" class="bank-logo w-10 h-10 object-contain mr-2" style="display:none;">
                <span class="bank-name">Pilih Bank</span>
            </div>
            <div class="options absolute border bg-white w-full mt-1 hidden z-10 max-h-40 overflow-auto">
                @foreach($banks as $bank)
                    <div class="option flex items-center p-2 cursor-pointer hover:bg-gray-100" 
                        data-id="{{ $bank->id }}" 
                        data-name="{{ $bank->name }}" 
                        data-logo="{{ asset('storage/'.$bank->logo) }}">
                        <img src="{{ asset('storage/'.$bank->logo) }}" class="w-10 h-10 object-contain mr-2">
                    </div>
                @endforeach
            </div>
        </div>

        <input type="text" name="banks[number][]" placeholder="No Rekening"
            class="border p-2 w-full mb-1 mt-2">

        <input type="text" name="banks[holder][]" placeholder="Atas Nama"
            class="border p-2 w-full">

    </div>`;

    let container = document.getElementById('bank-wrapper');
    container.insertAdjacentHTML('beforeend', html);

    // Init dropdown pada elemen baru
    initBankDropdown(container.lastElementChild.querySelector('.bank-select-wrapper'));
}

function removeBank(btn) {
    btn.closest('.bank-item').remove();
}

function initBankDropdown(wrapper){
    const selected = wrapper.querySelector('.selected');
    const optionsContainer = wrapper.querySelector('.options');

    const hiddenNameInput = wrapper.closest('.bank-item')
        .querySelector('input[name="banks[name][]"]');

    const hiddenIdInput = wrapper.closest('.bank-item')
        .querySelector('input[name="banks[id][]"]');

    const logoImg = selected.querySelector('.bank-logo');
    const nameSpan = selected.querySelector('.bank-name');

    selected.addEventListener('click', () => {
        optionsContainer.classList.toggle('hidden');
    });

    optionsContainer.querySelectorAll('.option').forEach(option => {
        option.addEventListener('click', () => {

            const id = option.dataset.id;
            const name = option.dataset.name;
            const logo = option.dataset.logo;

            // UI
            nameSpan.textContent = name;
            logoImg.src = logo;
            logoImg.style.display = 'block';

            // 🔥 SIMPAN KE HIDDEN INPUT
            hiddenNameInput.value = name;
            hiddenIdInput.value = id;

            optionsContainer.classList.add('hidden');
        });
    });
}


// Tutup dropdown saat klik di luar
document.addEventListener('click', e => {
    if(!e.target.closest('.bank-select-wrapper')){
        document.querySelectorAll('.bank-select-wrapper .options').forEach(opt => opt.classList.add('hidden'));
    }
});

// Init dropdown untuk elemen yang sudah ada saat page load
document.querySelectorAll('.bank-select-wrapper').forEach(initBankDropdown);


</script>

</x-app-layout>
