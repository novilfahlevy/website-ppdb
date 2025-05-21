@extends('admin.layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center bg-light">
            <h6 class="m-0 font-weight-bold text-primary">Form Pengaturan Biaya</h6>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('fees.update') }}" method="POST">
                @csrf

                <!-- Sumbangan Fasilitas Pendidikan -->
                <div class="mb-5">
                    <div class="d-flex align-items-center mb-4">
                        <h5 class="mb-0 fw-bold">Sumbangan Fasilitas Pendidikan</h5>
                    </div>
                    <div class="card bg-light">
                        <div class="card-body p-4">
                            <div class="row">
                                @for ($i = 1; $i <= 5; $i++)
                                    <div class="col-md-6 col-lg-4 pb-3">
                                        <label for="sfp_option_{{ $i }}" class="form-label fw-medium">Pilihan
                                            {{ $i }}</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-primary text-white px-3 mr-2">Rp</span>
                                            <input type="text"
                                                class="form-control @error('sfp_option_' . $i) is-invalid @enderror"
                                                id="sfp_option_{{ $i }}" name="sfp_option_{{ $i }}"
                                                value="{{ old('sfp_option_' . $i, number_format($fee->{'sfp_option_' . $i}, 0, ',', '.')) }}"
                                                required style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                        </div>
                                        @error('sfp_option_' . $i)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dana Pengembangan Pendidikan -->
                <div class="mb-5">
                    <div class="d-flex align-items-center mb-4">
                        <h5 class="mb-0 fw-bold">Dana Pengembangan Pendidikan (DPP)</h5>
                    </div>
                    <div class="card bg-light">
                        <div class="card-body p-4">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="dpp_amount" class="form-label fw-medium">Jumlah DPP</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-primary text-white px-3 mr-2">Rp</span>
                                        <input type="text" class="form-control @error('dpp_amount') is-invalid @enderror"
                                            id="dpp_amount" name="dpp_amount"
                                            value="{{ old('dpp_amount', number_format($fee->dpp_amount, 0, ',', '.')) }}"
                                            required>
                                    </div>
                                    @error('dpp_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label class="form-label fw-medium mb-3">Rincian DPP</label>
                                <div id="dpp_items_container" class="mb-3">
                                    @foreach (old('dpp_items', $fee->dpp_items ?? []) as $index => $item)
                                        <div class="input-group input-group-lg mb-2">
                                            <input type="text"
                                                class="form-control @error('dpp_items.' . $index) is-invalid @enderror"
                                                name="dpp_items[]" value="{{ $item }}"
                                                placeholder="Masukkan item DPP" required>
                                            <button type="button" class="btn btn-danger remove-item px-3 ml-2">
                                                <i class="bi bi-trash-fill fs-5"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-outline-secondary" id="add_dpp_item">
                                    Tambah Item
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SPP -->
                <div class="mb-5">
                    <div class="d-flex align-items-center mb-4">
                        <h5 class="mb-0 fw-bold">Sumbangan Pembinaan Pendidikan (SPP)</h5>
                    </div>
                    <div class="card bg-light">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="spp_amount" class="form-label fw-medium">Jumlah SPP per bulan</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-primary text-white px-3 mr-2">Rp</span>
                                        <input type="text" class="form-control @error('spp_amount') is-invalid @enderror"
                                            id="spp_amount" name="spp_amount"
                                            value="{{ old('spp_amount', number_format($fee->spp_amount, 0, ',', '.')) }}"
                                            required>
                                    </div>
                                    @error('spp_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Information -->
                <div class="mb-4">
                    <div class="d-flex align-items-center mb-4">
                        <h5 class="mb-0 fw-bold">Informasi Kontak Pembayaran</h5>
                    </div>
                    <div class="card bg-light">
                        <div class="card-body p-4">
                            <div class="row g-4">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="payment_phone" class="form-label fw-medium">
                                        <i class="bi bi-telephone-fill mr-2"></i>Nomor Telepon
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-lg @error('payment_phone') is-invalid @enderror"
                                        id="payment_phone" name="payment_phone"
                                        value="{{ old('payment_phone', $fee->payment_phone) }}" required>
                                    @error('payment_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="payment_email" class="form-label fw-medium">
                                        <i class="bi bi-envelope-fill mr-2"></i>Email
                                    </label>
                                    <input type="email"
                                        class="form-control form-control-lg @error('payment_email') is-invalid @enderror"
                                        id="payment_email" name="payment_email"
                                        value="{{ old('payment_email', $fee->payment_email) }}" required>
                                    @error('payment_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const container = document.getElementById('dpp_items_container');
                const addButton = document.getElementById('add_dpp_item');
                const form = document.querySelector('form');

                function createItemInput() {
                    const div = document.createElement('div');
                    div.className = 'input-group input-group-lg mb-2';
                    div.innerHTML = `
                <input type="text" 
                    class="form-control"
                    name="dpp_items[]"
                    placeholder="Masukkan item DPP"
                    required>
                <button type="button" class="btn btn-danger remove-item px-3 ml-2">
                    <i class="bi bi-trash-fill fs-5"></i>
                </button>
            `;
                    return div;
                }

                addButton.addEventListener('click', function() {
                    container.appendChild(createItemInput());
                });

                // If no items exist, add one empty item
                if (container.children.length === 0) {
                    container.appendChild(createItemInput());
                }

                container.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-item')) {
                        const itemsCount = container.children.length;
                        if (itemsCount > 1) { // Prevent removing last item
                            e.target.closest('.input-group').remove();
                        }
                    }
                });

                // Format number with thousand separators (supports millions, billions, etc.)
                function formatNumber(input) {
                    const value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
                    input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Add thousand separators dynamically
                }

                // Remove formatting to get raw numeric value
                function removeFormatting(input) {
                    if (!input || !input.value) return ''; // Handle undefined or empty input
                    return input.value.replace(/\./g, ''); // Remove all thousand separators
                }

                // Apply formatting dynamically as the user types
                document.querySelectorAll('input[type="text"]').forEach(input => {
                    // Exclude DPP items and phone number from formatting
                    if (input.name === 'dpp_items[]' || input.name === 'payment_phone') return;

                    // Format default values on page load
                    formatNumber(input);

                    input.addEventListener('input', function() {
                        const rawValue = removeFormatting(this); // Get raw numeric value
                        const cursorPosition = this.selectionStart; // Save current cursor position
                        const beforeCursorValue = removeFormatting({
                            value: this.value.slice(0, cursorPosition)
                        }); // Raw value before cursor
                        formatNumber(this); // Format the input value
                        const newCursorPosition = beforeCursorValue.length + Math.floor(
                            beforeCursorValue.length / 3); // Adjust cursor position
                        this.setSelectionRange(newCursorPosition,
                        newCursorPosition); // Move cursor to the adjusted position
                    });
                });
            });
        </script>
    @endpush
@endsection
