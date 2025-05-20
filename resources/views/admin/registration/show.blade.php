@extends('admin.layouts.app')

@section('content')
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
                <div class="col-lg-6 col-12">
                    <table class="table table-borderless">
                        <tr>
                            <td class="w-50"><strong>Nama Periode</strong></td>
                            <td>
                                <span class="d-none d-md-inline">:</span> {{ $registration->name }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Tahun Ajaran</strong></td>
                            <td>
                                <span class="d-none d-md-inline">:</span> {{ $registration->academic_year ?: '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Mulai</strong></td>
                            <td>
                                <span class="d-none d-md-inline">:</span>
                                {{ $registration->start_date->translatedFormat('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Selesai</strong></td>
                            <td>
                                <span class="d-none d-md-inline">:</span>
                                {{ $registration->end_date->translatedFormat('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Status</strong></td>
                            <td>
                                @if ($registration->is_archived)
                                    <span class="badge bg-warning text-white">Diarsipkan</span>
                                @elseif ($registration->is_open)
                                    <span class="badge bg-success text-white">Dibuka</span>
                                @else
                                    <span class="badge bg-danger text-white">Ditutup</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <!-- Card Header - Dropdown -->
        <div class="card-header d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">Pendaftar</h6>
            <form method="GET" action="{{ route('registrations.show', ['id' => $registration->id]) }}"
                class="d-inline-block d-flex align-items-center">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white border-right-0">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <input type="text" name="cari" class="form-control border-left-0" placeholder="Cari pendaftar..."
                        value="{{ request('cari') }}">
                </div>
            </form>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" style="min-width: 250px;">Nama Lengkap</th>
                            <th scope="col" style="min-width: 200px;">NISN</th>
                            <th scope="col" style="min-width: 200px;">Jenis Kelamin</th>
                            <th scope="col" style="min-width: 300px;">Asal Sekolah</th>
                            <th scope="col" style="min-width: 200px;">No. HP</th>
                            <th scope="col" style="min-width: 200px;">Tanggal Mendaftar</th>
                            <th scope="col" class="sticky-column">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($applications as $index => $application)
                            <tr>
                                <td>{{ ($applications->currentpage() - 1) * $applications->perpage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $application->full_name }}</td>
                                <td>{{ $application->nisn }}</td>
                                <td>{{ $application->gender }}</td>
                                <td>{{ $application->previous_school_name }}</td>
                                <td>{{ $application->personal_phone_number ?: '-' }}</td>
                                <td>{{ $application->created_at->translatedFormat('d F Y') }}</td>
                                <td class="sticky-column" style="background-color: #eaecf4;">
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
            {{ $applications->links() }}
        </div>

        <style>
            .sticky-column {
                position: sticky;
                right: 0;
                background-color: #fff;
                z-index: 2;
            }

            tr:nth-child(even) .sticky-column {
                background-color: #f8f9fa;
                /* Match the striped row background */
            }
        </style>
    </div>
@endsection
