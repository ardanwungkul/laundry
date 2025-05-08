<x-app-layout>
    <x-slot name="header">
        Edit Pelanggan
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-3 max-w-xl mx-auto md:text-sm text-xs">
                    <div class="flex flex-col gap-1">
                        <input type="text" name="pelanggan_id" id="pelanggan_id" class="hidden">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input type="text" id="nama_pelanggan" name="nama_pelanggan"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $pelanggan->nama }}" placeholder="Masukkan Nama Pelanggan" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="nomor_pelanggan">Nomor Pelanggan</label>
                        <input type="text" id="nomor_pelanggan" name="nomor_pelanggan"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $pelanggan->no_hp }}" placeholder="Masukkan Nomor Pelanggan (62xxx/08xxx)"
                            required>
                        <small id="validation_nomor_pelanggan" style="color: red;"></small>

                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="alamat_pelanggan">Alamat Pelanggan</label>
                        <textarea id="alamat_pelanggan" name="alamat_pelanggan"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" rows="4"
                            placeholder="Masukkan Alamat Pelanggan" required>{{ $pelanggan->alamat }}</textarea>
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
                            href="{{ route('pelanggan.index') }}">
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
<script>
    document.getElementById('nomor_pelanggan').addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9+]/g, '');
    });

    const validationNomorHp = document.getElementById('validation_nomor_pelanggan');

    document.getElementById('nomor_pelanggan').addEventListener('blur', function(e) {
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
