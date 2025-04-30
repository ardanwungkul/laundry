<x-app-layout>
    <x-slot name="header">
        Daftar Order
    </x-slot>

    <x-container>
        <x-slot name="content">
            <div>
                <a href="{{ route('order.create') }}"
                    class="bg-secondary-3 text-secondary-2 rounded-lg px-3 py-2 text-xs border border-secondary-4 shadow-lg flex gap-1 items-center justify-center mb-12 md:mb-4 whitespace-nowrap w-min font-medium">
                    <svg viewBox="0 0 24 24" fill="none" class="w-3 h-3 stroke-secondary-2"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 12H20M12 4V20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                    <p>
                        Tambah
                    </p>
                </a>
                <div class="relative pb-20">
                    <div class="rounded-lg overflow-hidden shadow-lg border border-secondary-4">
                        <table id="datatable" class="text-sm hover stripe row-border">
                            <thead class="bg-secondary-3 text-secondary-2 font-medium">
                                <tr class="text-xs">
                                    <td class="!font-medium !text-xs">No</td>
                                    <td class="!font-medium !text-xs">Tanggal</td>
                                    <td class="!font-medium !text-xs">Nama</td>
                                    <td class="!font-medium !text-xs">Harga</td>
                                    <td class="!font-medium !text-xs">Status Proses</td>
                                    <td class="!font-medium !text-xs">Status Pembayaran</td>
                                    <td class="!font-medium !text-xs">Keterangan</td>
                                    <td class="!font-medium !text-xs">Alamat</td>
                                    <td class="!font-medium !text-xs">Order</td>
                                    <td class="!font-medium !text-xs">Delive</td>
                                    <td class="!font-medium !text-xs">Petugas</td>
                                    <td class="!font-medium !text-xs w-32"></td>
                                </tr>
                            </thead>
                            <tbody class="text-secondary-2">
                                @foreach ($data as $item)
                                    <tr class="text-xs">
                                        <td>
                                            <p>{{ $loop->index + 1 }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->tanggal }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->nama }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->harga }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->status_proses }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->status_pembayaran }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->keterangan }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->alamat }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->order }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->delive }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item }}</p>
                                        </td>
                                        <td>
                                            <div class="flex justify-center items-center gap-3">
                                                <div>
                                                    <div>
                                                        <a href="{{ route('pegawai.edit', $item->id) }}"
                                                            class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                                                            <svg class="w-4 h-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-container>
</x-app-layout>
<script type="module">
    $(document).ready(function() {
        $('#datatable').DataTable({
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
            // responsive: true,
            responsive: {
                details: {
                    renderer: function(api, rowIdx, columns) {
                        let data = columns
                            .map((col, i) => {
                                return col.hidden ?
                                    `<div class="my-3">
                                        <p class="text-xs font-bold">${col.title}</p>
                                        <div class="text-xs">${col.data}</div>
                                    </div>` : '';
                            })
                            .join('');

                        let table = document.createElement('table');
                        table.innerHTML = data;

                        return data ? table : false;
                    }
                }
            },
            columnDefs: [{
                targets: '_all',
                className: 'dt-head-left',
            }]
            // columnDefs: [{
            //     orderable: false,
            //     targets: [3, 4, 5]
            // }, {
            //     className: 'dt-head-center',
            //     targets: [1, 2, 3, 4, 5]
            // }]
        });
        $(document).on('click', '[data-modal-id]', function() {
            const modalId = $(this).data('modal-id');

            const $targetEl = $(`[id="confirm-delete-${modalId}"]`);

            const modal = new Modal($targetEl[0]);
            if (modal) {
                modal.toggle();
            }
        });
        $(document).on('click', '[data-modal-hide]', function() {
            const modalId = $(this).data('modal-hide');
            const $targetEl = $(`#${modalId}`);

            const modal = new Modal($targetEl[0]);
            if (modal) {
                modal.hide();
            }
        });
    });
</script>
