<x-app-layout>
    <style>
        .dt-search {
            display: none;
        }
    </style>
    <x-slot name="header">
        Daftar Order
    </x-slot>

    <x-container>
        <x-slot name="content">
            <div>
                <div class="flex flex-col md:flex-row gap-3 justify-between mb-3">
                    <div class="flex gap-3 justify-between">
                        <a href="{{ route('order.create') }}"
                            class="bg-secondary-3 text-secondary-2 rounded-lg px-3 py-2 text-xs border border-secondary-4 shadow-lg flex gap-1 items-center justify-center whitespace-nowrap w-min font-medium">
                            <svg viewBox="0 0 24 24" fill="none" class="w-3 h-3 stroke-secondary-2"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 12H20M12 4V20" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                            </svg>
                            <p>
                                Tambah
                            </p>
                        </a>
                        <div>
                            <input type="month" id="filterDate"
                                class="text-xs border-secondary-4 text-secondary-2 bg-secondary-3 rounded-lg shadow-lg font-medium">
                        </div>
                    </div>
                    <div class="w-full max-w-full flex-none md:max-w-40">
                        <input type="search" id="customSearch"
                            class="text-xs border-secondary-4 text-secondary-2 bg-secondary-3 rounded-lg shadow-lg w-full"
                            placeholder="Cari....">
                    </div>
                </div>
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
                                            <p>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->format('d F Y') }}
                                            </p>
                                        </td>
                                        <td>
                                            <p>{{ $item->nama_pelanggan }}</p>
                                        </td>
                                        <td>
                                            <p class="whitespace-nowrap">Rp.
                                                {{ number_format($item->harga, 0, ',', '.') }}</p>
                                        </td>
                                        <td>
                                            @if ($item->status_proses == 'pending')
                                                <p
                                                    class="bg-gray-300 px-1 py-1 rounded-lg whitespace-nowrap text-gray-500 font-medium text-center shadow-lg capitalize">
                                                    {{ str_replace('_', ' ', $item->status_proses) }}
                                                </p>
                                            @elseif($item->status_proses == 'sedang_dikerjakan' || $item->status_proses == 'selesai_dikerjakan')
                                                <p
                                                    class="bg-blue-300 px-1 py-1 rounded-lg whitespace-nowrap text-gray-500 font-medium text-center shadow-lg capitalize">
                                                    {{ str_replace('_', ' ', $item->status_proses) }}
                                                </p>
                                            @elseif($item->status_proses == 'antar')
                                                <p
                                                    class="bg-green-300 px-1 py-1 rounded-lg whitespace-nowrap text-gray-500 font-medium text-center shadow-lg capitalize">
                                                    {{ str_replace('_', ' ', $item->status_proses) }}
                                                </p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status_pembayaran == 'belum_bayar')
                                                <p
                                                    class="bg-red-300 px-1 py-1 rounded-lg whitespace-nowrap text-gray-500 font-medium text-center shadow-lg capitalize">
                                                    Belum Bayar
                                                </p>
                                            @else
                                                <p
                                                    class="bg-green-300 px-1 py-1 rounded-lg whitespace-nowrap text-gray-500 font-medium text-center shadow-lg capitalize">
                                                    {{ $item->status_pembayaran }}
                                                </p>
                                            @endif
                                        </td>
                                        <td>
                                            <p>{{ $item->keterangan }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->alamat_pelanggan }}</p>
                                        </td>
                                        <td>
                                            <p>{{ \Carbon\Carbon::createFromFormat('H:i:s', $item->order)->format('H:i') }}
                                            </p>
                                        </td>
                                        <td>
                                            <p>{{ $item->delive ? \Carbon\Carbon::createFromFormat('H:i:s', $item->delive)->format('H:i') : '-' }}
                                            </p>
                                        </td>
                                        <td>
                                            <p>{{ $item->pegawai ? $item->pegawai->nama : '' }}</p>
                                        </td>
                                        <td>
                                            <div class="flex justify-center items-center gap-3">
                                                @if (
                                                    !$item->delive &&
                                                        !$item->pegawai_id &&
                                                        $item->status_pembayaran == 'belum_bayar' &&
                                                        $item->status_proses !== 'antar')
                                                    <div title="Progress">
                                                        <button type="button"
                                                            data-modal-target="progress-order-{{ $item->id }}"
                                                            data-modal-toggle="progress-order-{{ $item->id }}"
                                                            class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg fill-secondary-2 text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                                                            <svg viewBox="0 0 1920 1920" class="w-4 h-4"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path
                                                                        d="M320.006 962.032c0 352.866 287.052 639.974 640.026 639.974 173.767 0 334.093-69.757 451.938-188.072l-211.928-211.912h480.019v479.981l-155.046-155.114C1377.649 1674.883 1177.24 1762 960.032 1762 518.814 1762 160 1403.134 160 962.032ZM959.968 162C1401.186 162 1760 520.866 1760 961.968h-160.006c0-352.866-287.052-639.974-640.026-639.974-173.767 0-334.093 69.757-451.938 188.072l211.928 211.912H239.94V241.997L394.985 397.03C542.351 249.117 742.76 162 959.968 162Z"
                                                                        fill-rule="evenodd"></path>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <x-modal.progress-order :order="$item" :pegawai="$pegawai" />
                                                @else
                                                @endif

                                                {{-- <div title="Edit Order">
                                                    <a href="{{ route('order.edit', $item->id) }}"
                                                        class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                                                        <svg class="w-4 h-4" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                                        </svg>
                                                    </a>
                                                </div> --}}
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
        let table = $('#datatable').DataTable({
            info: false,
            lengthChange: false,
            deferRender: true,
            searching: true,
            paging: true,
            language: {
                // search: '',
                emptyTable: "Tidak ada data tersedia",
                searchPlaceholder: 'Cari...'
            },
            ordering: false,
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
        $('#customSearch').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>
<script type="module">
    $(document).ready(function() {
        const filterRequest = `{{ request()->filterDate }}`
        const elementFilter = $('#filterDate');

        if (filterRequest === '') {
            elementFilter.val(`{{ date('Y-m') }}`);
        } else {
            elementFilter.val(filterRequest)
        }


        $('#filterDate').on('change', function() {
            const filter = $(this).val()
            window.location = `{{ route('order.index', ['filterDate' => 'date']) }}`.replace('date',
                filter)
        })
    })
</script>
