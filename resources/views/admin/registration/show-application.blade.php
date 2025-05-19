@extends('admin.layouts.app')

@section('content')
    <style>
        @media (max-width: 768px) {
            .table-borderless td {
                display: block;
                padding: 0.25rem 0;
            }

            .table-borderless td:first-child {
                font-weight: bold;
                padding-top: 1rem;
            }

            .document-btn {
                white-space: normal;
                height: auto;
                min-height: 50px;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
            }
        }
    </style>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-truncate">
                <a href="{{ route('registrations.index') }}">Pendaftaran</a>
            </li>
            <li class="breadcrumb-item text-truncate">
                <a href="{{ route('registrations.show', $application->registration_id) }}">
                    {{ $application->registration->name }}
                </a>
            </li>
            <li class="breadcrumb-item active text-truncate">
                Data pendaftaran <b>{{ $application->full_name }}</b>
            </li>
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
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tr>
                                <td width="200"><strong>Nama Lengkap</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->full_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>NISN</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->nisn }}</td>
                            </tr>
                            <tr>
                                <td><strong>Jenis Kelamin</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->gender }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tempat, Tanggal Lahir</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->birth_place }},
                                    {{ $application->birth_date->translatedFormat('d F Y') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Agama</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->religion }}</td>
                            </tr>
                            <tr>
                                <td><strong>Alamat</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->full_address }}</td>
                            </tr>
                            <tr>
                                <td><strong>Domisili Sekarang</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->current_domicile }}</td>
                            </tr>
                            <tr>
                                <td><strong>No. HP</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->personal_phone_number ?: '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->email ?: '-' }}</td>
                            </tr>
                        </table>
                    </div>
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
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tr>
                                <td width="200"><strong>Nama Ayah</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->father_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Nama Ibu</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->mother_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Pendidikan Terakhir</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->parents_last_education }}</td>
                            </tr>
                            <tr>
                                <td><strong>Pekerjaan</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->parents_occupation_other ?: $application->parents_occupation }}</td>
                            </tr>
                            <tr>
                                <td><strong>Penghasilan</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->parents_income ?: '-' }}</td>
                            </tr>
                            <tr>
                                <td><strong>No. HP</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->parents_phone_number }}</td>
                            </tr>
                            <tr>
                                <td><strong>Alamat</strong></td>
                                <td><span class="d-none d-md-inline">:</span> {{ $application->parents_address ?: 'Sama dengan alamat siswa' }}</td>
                            </tr>
                        </table>
                    </div>
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
                        <div class="col-xl-6 col-12">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tr>
                                        <td width="200"><strong>Nama Sekolah</strong></td>
                                        <td><span class="d-none d-md-inline">:</span> {{ $application->previous_school_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status Sekolah</strong></td>
                                        <td><span class="d-none d-md-inline">:</span> {{ $application->school_status }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Alamat Sekolah</strong></td>
                                        <td><span class="d-none d-md-inline">:</span> {{ $application->previous_school_address }}</td>
                                    </tr>
                                </table>
                            </div>
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
                    <a href="{{ route('registrations.applications.edit', ['id' => $application->id]) }}"
                        class="btn btn-primary">
                        <i class="fas fa-edit mr-2"></i>Edit Dokumen
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <a href="{{ $application->birth_certificate_filepath ? asset('storage/' . $application->birth_certificate_filepath) : '#' }}"
                                class="btn btn-primary w-100 document-btn {{ $application->birth_certificate_filepath ? '' : 'disabled' }}"
                                target="{{ $application->birth_certificate_filepath ? '_blank' : '' }}">
                                <i class="fas fa-file-pdf mr-2"></i> Akta Kelahiran
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <a href="{{ $application->family_card_filepath ? asset('storage/' . $application->family_card_filepath) : '#' }}"
                                class="btn btn-primary w-100 document-btn {{ $application->family_card_filepath ? '' : 'disabled' }}"
                                target="{{ $application->family_card_filepath ? '_blank' : '' }}">
                                <i class="fas fa-file-pdf mr-2"></i> Kartu Keluarga
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <a href="{{ $application->report_card_filepath ? asset('storage/' . $application->report_card_filepath) : '#' }}"
                                class="btn btn-primary w-100 document-btn {{ $application->report_card_filepath ? '' : 'disabled' }}"
                                target="{{ $application->report_card_filepath ? '_blank' : '' }}">
                                <i class="fas fa-file-pdf mr-2"></i> Rapor
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <a href="{{ $application->recent_photo_filepath ? asset('storage/' . $application->recent_photo_filepath) : '#' }}"
                                class="btn btn-primary w-100 document-btn {{ $application->recent_photo_filepath ? '' : 'disabled' }}"
                                target="{{ $application->recent_photo_filepath ? '_blank' : '' }}">
                                <i class="fas fa-image mr-2"></i> Pas Foto
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <a href="{{ $application->achievement_certificate_filepath ? asset('storage/' . $application->achievement_certificate_filepath) : '#' }}"
                                class="btn btn-primary w-100 document-btn {{ $application->achievement_certificate_filepath ? '' : 'disabled' }}"
                                target="{{ $application->achievement_certificate_filepath ? '_blank' : '' }}">
                                <i class="fas fa-file-pdf mr-2"></i> Sertifikat Prestasi
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <a href="{{ $application->domicile_certificate_filepath ? asset('storage/' . $application->domicile_certificate_filepath) : '#' }}"
                                class="btn btn-primary w-100 document-btn {{ $application->domicile_certificate_filepath ? '' : 'disabled' }}"
                                target="{{ $application->domicile_certificate_filepath ? '_blank' : '' }}">
                                <i class="fas fa-file-pdf mr-2"></i> Surat Keterangan Domisili
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <a href="{{ $application->proof_of_payment_filepath ? asset('storage/' . $application->proof_of_payment_filepath) : '#' }}"
                                class="btn btn-primary w-100 document-btn {{ $application->proof_of_payment_filepath ? '' : 'disabled' }}"
                                target="{{ $application->proof_of_payment_filepath ? '_blank' : '' }}">
                                <i class="fas fa-file-pdf mr-2"></i> Bukti Pembayaran
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
