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
                <form method="GET" action="{{ route('registrations.show', ['id' => $registration->id]) }}" class="d-inline-block d-flex align-items-center">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white border-right-0">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input type="text" name="cari" class="form-control border-left-0" placeholder="Cari pendaftar..." value="{{ request('search') }}">
                    </div>
                </form>
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
                            @forelse ($applications as $index => $application)
                                <tr>
                                    <td>{{ ($applications ->currentpage()-1) * $applications ->perpage() + $loop->index + 1 }}</td>
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
                    {{ $applications->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
