<x-app-layout>
    <x-slot name="header">
        Edit Pegawai
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $pegawai->nama }}" placeholder="Masukkan Nama User" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="no_hp">Nomor Hp</label>
                        <input type="text" id="no_hp" name="no_hp"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            autocomplete="new-email" value="{{ $pegawai->no_hp }}" placeholder="Masukkan Nomor Hp"
                            required>
                        <small id="validation_no_hp" style="color: red;"></small>

                    </div>
                    <div class="flex md:justify-end justify-between items-center md:gap-4 gap-1">
                        <button
                            class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-4 rounded-lg border border-secondary-4 flex items-center gap-1 text-xs md:text-sm shadow-md"
                            type="submit">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>

                            <p>Simpan</p>
                        </button>
                        <a class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-4 rounded-lg border border-secondary-4 flex items-center gap-1 text-xs md:text-sm shadow-md"
                            href="{{ route('pegawai.index') }}">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>

                            <p>Kembali</p>
                        </a>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>
{{-- Nomor Hp --}}
<script>
    document.getElementById('no_hp').addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9+]/g, '');
    });

    const validationNomorHp = document.getElementById('validation_no_hp');

    document.getElementById('no_hp').addEventListener('blur', function(e) {
        let val = this.value.trim();

        if (/^08/.test(val)) {
            val = val.replace(/^08/, '628');
        }

        if (/^628\d{7,12}$/.test(val)) {
            this.value = val;
            validationNomorHp.textContent = '';
        } else {
            this.value = '';
            validationNomorHp.textContent = 'Nomor tidak valid!';
        }
    });
</script>
