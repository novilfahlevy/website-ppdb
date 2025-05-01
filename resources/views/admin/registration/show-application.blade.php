@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('registrations.index') }}">Pendaftaran</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('registrations.show', $application->registration_id) }}">{{ $application->registration->name }}</a>
                </li>
                <li class="breadcrumb-item active">Data pendaftaran <b>{{ $application->full_name }}</b></li>
            </ol>
        </nav>

        <div class="row">
            <!-- Personal Information Card -->
            <div class="col-xl-6 col-lg-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pribadi</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td width="200">Nama Lengkap</td>
                                <td>: {{ $application->full_name }}</td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td>: {{ $application->nisn }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: {{ $application->gender }}</td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir</td>
                                <td>: {{ $application->birth_place }},
                                    {{ $application->birth_date->translatedFormat('d F Y') }}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>: {{ $application->religion }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: {{ $application->full_address }}</td>
                            </tr>
                            <tr>
                                <td>No. HP</td>
                                <td>: {{ $application->personal_phone_number ?: '-' }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: {{ $application->email ?: '-' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Parent Information Card -->
            <div class="col-xl-6 col-lg-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Orang Tua</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td width="200">Nama Ayah</td>
                                <td>: {{ $application->father_name }}</td>
                            </tr>
                            <tr>
                                <td>Nama Ibu</td>
                                <td>: {{ $application->mother_name }}</td>
                            </tr>
                            <tr>
                                <td>Pendidikan Terakhir</td>
                                <td>: {{ $application->parents_last_education }}</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>: {{ $application->parents_occupation }}</td>
                            </tr>
                            <tr>
                                <td>Penghasilan</td>
                                <td>: {{ $application->parents_income ?: '-' }}</td>
                            </tr>
                            <tr>
                                <td>No. HP</td>
                                <td>: {{ $application->parents_phone_number }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: {{ $application->parents_address ?: 'Sama dengan alamat siswa' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Previous School Information Card -->
            <div class="col-xl-12 col-lg-12 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Sekolah Asal</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <td width="200">Nama Sekolah</td>
                                        <td>: {{ $application->previous_school_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>NPSN</td>
                                        <td>: {{ $application->previous_school_npsn }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status Sekolah</td>
                                        <td>: {{ $application->school_status }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Sekolah</td>
                                        <td>: {{ $application->previous_school_address }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Peserta Ujian</td>
                                        <td>: {{ $application->exam_participant_number ?: '-' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documents Card -->
            <div class="col-xl-12 col-lg-12 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Dokumen</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <a href="{{ asset('storage/' . $application->birth_certificate_filepath) }}"
                                    class="btn btn-primary w-100" target="_blank">
                                    <i class="fas fa-file-pdf mr-2"></i> Akta Kelahiran
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="{{ asset('storage/' . $application->family_card_filepath) }}"
                                    class="btn btn-primary w-100" target="_blank">
                                    <i class="fas fa-file-pdf mr-2"></i> Kartu Keluarga
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="{{ asset('storage/' . $application->report_card_filepath) }}"
                                    class="btn btn-primary w-100" target="_blank">
                                    <i class="fas fa-file-pdf mr-2"></i> Rapor
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="{{ asset('storage/' . $application->recent_photo_filepath) }}"
                                    class="btn btn-primary w-100" target="_blank">
                                    <i class="fas fa-image mr-2"></i> Pas Foto
                                </a>
                            </div>
                            @if ($application->achievement_certificate_filepath)
                                <div class="col-md-3 mb-3">
                                    <a href="{{ asset('storage/' . $application->achievement_certificate_filepath) }}"
                                        class="btn btn-primary w-100" target="_blank">
                                        <i class="fas fa-file-pdf mr-2"></i> Sertifikat Prestasi
                                    </a>
                                </div>
                            @endif
                            @if ($application->domicile_certificate_filepath)
                                <div class="col-md-3 mb-3">
                                    <a href="{{ asset('storage/' . $application->domicile_certificate_filepath) }}"
                                        class="btn btn-primary w-100" target="_blank">
                                        <i class="fas fa-file-pdf mr-2"></i> Surat Keterangan Domisili
                                    </a>
                                </div>
                            @endif
                            @if ($application->proof_of_payment_filepath)
                                <div class="col-md-3 mb-3">
                                    <a href="{{ asset('storage/' . $application->proof_of_payment_filepath) }}"
                                        class="btn btn-primary w-100" target="_blank">
                                        <i class="fas fa-file-pdf mr-2"></i> Bukti Pembayaran
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
