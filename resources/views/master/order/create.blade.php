<x-app-layout>
    <x-slot name="header">
        Buat Order
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <fieldset class="border rounded-lg p-5 bg-gray-50 shadow-lg">
                        <legend>Detail Order</legend>
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
                            <div class="flex flex-col gap-1 col-span-2">
                                <label for="harga">Harga</label>
                                <input type="text" id="harga" name="harga"
                                    class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                    autocomplete="new-password" value="{{ old('harga') }}" placeholder="Harga"
                                    oninput="this.value = formatRupiah(this.value, 'Rp. ')" required>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="border rounded-lg p-5 bg-gray-50 shadow-lg space-y-3">
                        <legend class="px-3">Pelanggan</legend>


                        <div class="space-y-3">
                            <div class="flex flex-col gap-1">
                                <input type="text" name="pelanggan_id" id="pelanggan_id" class="hidden">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                <input type="text" id="nama_pelanggan" name="nama_pelanggan"
                                    class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                    value="{{ old('nama_pelanggan') }}" placeholder="Masukkan Nama Pelanggan" required>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="nomor_pelanggan">Nomor Pelanggan</label>
                                <input type="text" id="nomor_pelanggan" name="nomor_pelanggan"
                                    class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                    value="{{ old('nomor_pelanggan') }}"
                                    placeholder="Masukkan Nomor Pelanggan (62xxx/08xxx)" required>
                                <small id="validation_nomor_pelanggan" style="color: red;"></small>

                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="alamat_pelanggan">Alamat Pelanggan</label>
                                <textarea id="alamat_pelanggan" name="alamat_pelanggan"
                                    class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" rows="4"
                                    placeholder="Masukkan Alamat Pelanggan" required></textarea>
                            </div>
                        </div>
                        <fieldset class="w-full border-t">
                            <legend class="text-center px-3">atau</legend>
                        </fieldset>
                        <div class="col-span-2 flex flex-col gap-1">
                            <label for="pelanggan_keterangan" class="text-center">Pilih dari Data Pelanggan</label>
                            <div class="flex gap-3">
                                <input type="text" name="pelanggan_keterangan" id="pelanggan_keterangan"
                                    data-modal-target="pilih-pelanggan" data-modal-toggle="pilih-pelanggan"
                                    class="rounded-lg text-sm border border-secondary-4 w-full cursor-pointer shadow-lg"
                                    placeholder="Ketuk untuk memilih pelanggan" readonly required>
                                <div id="button-hapus-pelanggan" class="hidden">
                                    <button type="button"
                                        class="border border-red-500 hover:bg-red-500 hover:text-white text-red-500 transition-colors duration-300 rounded-lg h-[37.33px] w-[37.33px] flex-none bg-white shadow-lg flex items-center justify-center">
                                        <p class="text-sm font-extrabold">X</p>
                                    </button>
                                </div>
                            </div>
                            <x-modal.pilih-pelanggan :pelanggan="$pelanggan" />
                        </div>

                    </fieldset>
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

{{-- Pegawai --}}
<script type="module">
    let tablePelanggan = $('#tablePelanggan').DataTable({
        info: false,
        lengthChange: false,
        deferRender: true,
        paging: true,
        language: {
            search: '',
            emptyTable: "Tidak ada data tersedia",
            searchPlaceholder: 'Cari...'
        },
        ordering: false,
        responsive: true,
        columnDefs: [{
            targets: '_all',
            className: 'dt-head-left',
        }]
    });
    $('.datatable tbody').on('click', '.button-pelanggan-check', function() {
        const pelanggan_id = $(this).data('id');
        const nama_pelanggan = $(this).data('nama');
        const nomor_pelanggan = $(this).data('nomor');
        const alamat_pelanggan = $(this).data('alamat');
        if (pelanggan_id) {
            $('#pelanggan_id').val(pelanggan_id);

            $('#nama_pelanggan').val(nama_pelanggan).attr('readonly', true);
            $('#nomor_pelanggan').val(nomor_pelanggan).attr('readonly', true);
            $('#alamat_pelanggan').val(alamat_pelanggan).attr('readonly', true);

            $('#pelanggan_keterangan').val(nama_pelanggan + ' - Terpilih')
            $('#button-hapus-pelanggan').removeClass('hidden');
        }
        $('#close-button-pilih-pelanggan').click()
    });

    $('#button-hapus-pelanggan').on('click', function() {
        $('#pelanggan_id').val('');

        $('#nama_pelanggan').val('').attr('readonly', false);
        $('#nomor_pelanggan').val('').attr('readonly', false);
        $('#alamat_pelanggan').val('').attr('readonly', false);

        $('#pelanggan_keterangan').val('');
        $(this).addClass('hidden');
    })
</script>

{{-- Harga --}}
<script>
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

{{-- Nomor Hp --}}
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
