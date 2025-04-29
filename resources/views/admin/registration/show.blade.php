@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('registrations.index') }}">Pendaftaran</a></li>
                <li class="breadcrumb-item">{{ $registration->name }}</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Periode Pendaftaran</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td width="200">Nama Periode</td>
                                <td>: {{ $registration->name }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Mulai</td>
                                <td>: {{ $registration->start_date->translatedFormat('d F Y') }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Selesai</td>
                                <td>: {{ $registration->end_date->translatedFormat('d F Y') }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <span>:</span>
                                    <span class="badge bg-{{ $registration->is_open ? 'success' : 'danger' }} text-white">
                                        {{ $registration->is_open ? 'Dibuka' : 'Ditutup' }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pendaftar</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>NISN</th>
                                <th>Jenis Kelamin</th>
                                <th>Asal Sekolah</th>
                                <th>No. HP</th>
                                <th>Tanggal Mendaftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($registration->applications as $index => $application)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $application->full_name }}</td>
                                    <td>{{ $application->nisn }}</td>
                                    <td>{{ $application->gender }}</td>
                                    <td>{{ $application->previous_school_name }}</td>
                                    <td>{{ $application->personal_phone_number ?: '-' }}</td>
                                    <td>{{ $application->created_at->translatedFormat('d F Y') }}</td>
                                    <td>
                                        <a href="{{ route('registrations.application', ['id' => $application->id]) }}"
                                            class="btn btn-sm btn-info">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Belum ada pendaftar</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
