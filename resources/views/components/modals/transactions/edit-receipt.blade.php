<form wire:submit.prevent="editReceipt">
    <div class="modal fade" tabindex="-1" id="editReceiptModal" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-0 bg-info text-white">
                    <h5 class="modal-title fw-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-upload me-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383"/>
                            <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708z"/>
                        </svg>
                        {{ $transaction->receipt ? 'Ubah' : 'Upload' }} Bukti Transaksi
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pilih Gambar Bukti</label>
                        <input type="file" class="form-control form-control-lg" wire:model="editReceiptFile" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
                        @error('editReceiptFile')
                            <br><span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    @if ($editReceiptFile)
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Preview:</label>
                            <div class="text-center p-3 bg-light rounded">
                                <img src="{{ $editReceiptFile->temporaryUrl() }}" class="img-fluid shadow rounded" style="max-height: 300px; object-fit: contain;">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info text-white" @if(!$editReceiptFile) disabled @endif>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle me-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                        </svg>
                        Upload Bukti
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>