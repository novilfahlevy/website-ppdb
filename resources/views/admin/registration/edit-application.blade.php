@extends('admin.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('registrations.index') }}">Pendaftaran</a></li>
            <li class="breadcrumb-item">
                <a
                    href="{{ route('registrations.show', $application->registration_id) }}">{{ $application->registration->name }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('registrations.application', ['id' => $application->id]) }}">
                    Data pendaftaran <b>{{ $application->full_name }}</b>
                </a>
            </li>
            <li class="breadcrumb-item active">Edit Dokumen</li>
        </ol>
    </nav>

    <form action="{{ route('registrations.applications.update', ['id' => $application->id]) }}" method="POST"
        class="w-100" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Documents Card -->
            <div class="col-xl-12 col-lg-12 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Dokumen Pendaftaran</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label for="birth_certificate_filepath" class="form-label">Akta Kelahiran</label>
                                <input type="file" id="birth_certificate_filepath" name="birth_certificate_filepath"
                                    class="form-control">
                                @if ($application->birth_certificate_filepath)
                                    <div class="mt-2">
                                        <small>File saat ini: <a
                                                href="{{ Storage::url($application->birth_certificate_filepath) }}"
                                                target="_blank">Lihat File</a></small>
                                    </div>
                                @endif
                                @error('birth_certificate_filepath')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="family_card_filepath" class="form-label">Kartu Keluarga</label>
                                <input type="file" id="family_card_filepath" name="family_card_filepath"
                                    class="form-control">
                                @if ($application->family_card_filepath)
                                    <div class="mt-2">
                                        <small>File saat ini: <a
                                                href="{{ Storage::url($application->family_card_filepath) }}"
                                                target="_blank">Lihat File</a></small>
                                    </div>
                                @endif
                                @error('family_card_filepath')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="report_card_filepath" class="form-label">Rapor</label>
                                <input type="file" id="report_card_filepath" name="report_card_filepath"
                                    class="form-control">
                                @if ($application->report_card_filepath)
                                    <div class="mt-2">
                                        <small>File saat ini: <a
                                                href="{{ Storage::url($application->report_card_filepath) }}"
                                                target="_blank">Lihat File</a></small>
                                    </div>
                                @endif
                                @error('report_card_filepath')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="recent_photo_filepath" class="form-label">Foto Terbaru</label>
                                <input type="file" id="recent_photo_filepath" name="recent_photo_filepath"
                                    class="form-control">
                                @if ($application->recent_photo_filepath)
                                    <div class="mt-2">
                                        <small>File saat ini: <a
                                                href="{{ Storage::url($application->recent_photo_filepath) }}"
                                                target="_blank">Lihat File</a></small>
                                    </div>
                                @endif
                                @error('recent_photo_filepath')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="achievement_certificate_filepath" class="form-label">Sertifikat
                                    Prestasi</label>
                                <input type="file" id="achievement_certificate_filepath"
                                    name="achievement_certificate_filepath" class="form-control">
                                @if ($application->achievement_certificate_filepath)
                                    <div class="mt-2">
                                        <small>File saat ini: <a
                                                href="{{ Storage::url($application->achievement_certificate_filepath) }}"
                                                target="_blank">Lihat File</a></small>
                                    </div>
                                @endif
                                @error('achievement_certificate_filepath')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="domicile_certificate_filepath" class="form-label">Surat Keterangan
                                    Domisili</label>
                                <input type="file" id="domicile_certificate_filepath"
                                    name="domicile_certificate_filepath" class="form-control">
                                @if ($application->domicile_certificate_filepath)
                                    <div class="mt-2">
                                        <small>File saat ini: <a
                                                href="{{ Storage::url($application->domicile_certificate_filepath) }}"
                                                target="_blank">Lihat File</a></small>
                                    </div>
                                @endif
                                @error('domicile_certificate_filepath')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="proof_of_payment_filepath" class="form-label">Bukti Pembayaran</label>
                                <input type="file" id="proof_of_payment_filepath" name="proof_of_payment_filepath"
                                    class="form-control">
                                @if ($application->proof_of_payment_filepath)
                                    <div class="mt-2">
                                        <small>File saat ini: <a
                                                href="{{ Storage::url($application->proof_of_payment_filepath) }}"
                                                target="_blank">Lihat File</a></small>
                                    </div>
                                @endif
                                @error('proof_of_payment_filepath')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 px-0">
                            <a href="{{ route('registrations.application', ['id' => $application->id]) }}"
                                class="btn btn-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <!-- No longer needed as we removed the parent occupation fields
        <script>
            function toggleOtherOccupation() {
                const occupation = document.getElementById('parents_occupation').value;
                const otherDiv = document.getElementById('other_occupation_div');
                const otherInput = document.getElementById('parents_occupation_other');

                if (occupation === 'Lainnya') {
                    otherDiv.style.display = 'block';
                    otherInput.required = true;
                    // Make sure the field is not empty
                    if (otherInput.value.trim() === '') {
                        otherInput.value = '';
                    }
                } else {
                    otherDiv.style.display = 'none';
                    otherInput.required = false;
                    // Clear the field when not needed
                    otherInput.value = '';
                }
            }

            // Call on page load to handle initial state
            document.addEventListener('DOMContentLoaded', toggleOtherOccupation);
        </script>
        -->
@endpush
