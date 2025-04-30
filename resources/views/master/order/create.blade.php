<x-app-layout>
    <x-slot name="header">
        Buat Order
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="grid grid-cols-2 gap-3">
                        <div class="flex flex-col gap-1">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="order">Order</label>
                            <input type="time" id="order" name="order"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                value="{{ date('H:i') }}" required>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input type="text" id="nama_pelanggan" name="nama_pelanggan"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            autocomplete="new-email" value="{{ old('nama_pelanggan') }}"
                            placeholder="Masukkan Nama Pelanggan" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="alamat_pelanggan">Alamat Pelanggan</label>
                        <textarea id="alamat_pelanggan" name="alamat_pelanggan"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" rows="4"
                            placeholder="Masukkan Alamat Pelanggan" required></textarea>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="harga">Harga</label>
                        <input type="number" id="harga" name="harga"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            autocomplete="new-password" value="{{ old('harga') }}" placeholder="Harga" required>
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
                            href="{{ route('users.index') }}">
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
