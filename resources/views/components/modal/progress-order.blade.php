@props(['order', 'pegawai'])
<div id="progress-order-{{ $order->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-end p-4 border-b rounded-t dark:border-gray-600 border-gray-200">
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="progress-order-{{ $order->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-4">
                <form action="{{ route('order.progress') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" value="{{ $order->id }}" name="order_id">
                    <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                        <div class="grid grid-cols-2 gap-3">
                            <div class="flex flex-col gap-1">
                                <label for="pegawai_id_{{ $order->id }}">Petugas</label>
                                <select name="pegawai_id" id="pegawai_id_{{ $order->id }}"
                                    class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                                    <option value="" selected disabled>Pilih Petugas</option>
                                    @foreach ($pegawai as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $order->pegawai_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="delive_{{ $order->id }}">Waktu Delive</label>
                                <input type="time" name="delive" id="delive_{{ $order->id }}"
                                    value="{{ $order->delive }}"
                                    class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="status_proses_{{ $order->id }}">Status Proses</label>
                                <select name="status_proses" id="status_proses_{{ $order->id }}" required
                                    class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md">
                                    <option value="" selected disabled>Pilih Status Proses</option>
                                    <option {{ $order->status_proses == 'pending' ? 'selected' : '' }} value="pending">
                                        Pending</option>
                                    <option {{ $order->status_proses == 'sedang_dikerjakan' ? 'selected' : '' }}
                                        value="sedang_dikerjakan">Sedang Dikerjakan</option>
                                    <option {{ $order->status_proses == 'selesai_dikerjakan' ? 'selected' : '' }}
                                        value="selesai_dikerjakan">Selesai Dikerjakan</option>
                                    <option {{ $order->status_proses == 'antar' ? 'selected' : '' }} value="antar">
                                        Diantar ke Tujuan</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="status_pembayaran_{{ $order->id }}">Pembayaran</label>
                                <select name="status_pembayaran" id="status_pembayaran_{{ $order->id }}"
                                    class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                                    <option value="" selected disabled>Pilih Metode Pembayaran</option>
                                    <option {{ $order->status_pembayaran == 'belum_bayar' ? 'selected' : '' }}
                                        value="belum_bayar">Belum Melakukan Pembayaran</option>
                                    <option {{ $order->status_pembayaran == 'cash' ? 'selected' : '' }} value="cash">
                                        Cash</option>
                                    <option {{ $order->status_pembayaran == 'transfer' ? 'selected' : '' }}
                                        value="transfer">Transfer</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="keterangan_{{ $order->id }}">Keterangan</label>
                            <textarea type="text" id="keterangan_{{ $order->id }}" name="keterangan"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" placeholder="Keterangan">{{ $order->keterangan }}</textarea>
                        </div>
                        <div
                            class="flex items-center justify-end text-sm py-4 border-t border-gray-200 rounded-b max-w-xl mx-auto">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            <button data-modal-hide="progress-order-{{ $order->id }}" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
