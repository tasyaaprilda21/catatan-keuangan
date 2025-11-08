<form wire:submit.prevent="editTransaction">
    <div class="modal fade" tabindex="-1" id="editTransactionModal" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-0 bg-warning text-dark">
                    <h5 class="modal-title fw-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square me-2" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                        Ubah Transaksi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tipe Transaksi</label>
                        <select class="form-select form-select-lg" wire:model="editType">
                            <option value="income">💰 Pemasukan</option>
                            <option value="expense">💸 Pengeluaran</option>
                        </select>
                        @error('editType')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kategori</label>
                        <input type="text" class="form-control form-control-lg" wire:model="editCategory">
                        @error('editCategory')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah (Rp)</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text">Rp</span>
                            <input type="number" step="0.01" class="form-control" wire:model="editAmount">
                        </div>
                        @error('editAmount')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Transaksi</label>
                        <input type="date" class="form-control form-control-lg" wire:model="editTransactionDate">
                        @error('editTransactionDate')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi</label>
                        <div wire:ignore>
                            <input id="editDescription" type="hidden" wire:model="editDescription">
                            <trix-editor input="editDescription" class="trix-content"></trix-editor>
                        </div>
                        @error('editDescription')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle me-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener('trix-change', function(event) {
        if (event.target.getAttribute('input') === 'editDescription') {
            @this.set('editDescription', event.target.value);
        }
    });
</script>