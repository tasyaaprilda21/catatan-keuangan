<form wire:submit.prevent="addTransaction">
    <div class="modal fade" tabindex="-1" id="addTransactionModal" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-0 bg-primary text-white">
                    <h5 class="modal-title fw-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle me-2" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg>
                        Tambah Transaksi Baru
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tipe Transaksi</label>
                        <select class="form-select form-select-lg" wire:model="addType">
                            <option value="">-- Pilih Tipe --</option>
                            <option value="income">💰 Pemasukan</option>
                            <option value="expense">💸 Pengeluaran</option>
                        </select>
                        @error('addType')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kategori</label>
                        <input type="text" class="form-control form-control-lg" wire:model="addCategory" placeholder="Contoh: Gaji, Makanan, Transport">
                        @error('addCategory')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah (Rp)</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text">Rp</span>
                            <input type="number" step="0.01" class="form-control" wire:model="addAmount" placeholder="0">
                        </div>
                        @error('addAmount')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Transaksi</label>
                        <input type="date" class="form-control form-control-lg" wire:model="addTransactionDate">
                        @error('addTransactionDate')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi (Opsional)</label>
                        <div wire:ignore>
                            <input id="addDescription" type="hidden" wire:model="addDescription">
                            <trix-editor input="addDescription" placeholder="Tambahkan catatan atau detail transaksi..." class="trix-content"></trix-editor>
                        </div>
                        @error('addDescription')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle me-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                        </svg>
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle me-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                        </svg>
                        Simpan Transaksi
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener('trix-change', function(event) {
        if (event.target.getAttribute('input') === 'addDescription') {
            @this.set('addDescription', event.target.value);
        }
    });
</script>