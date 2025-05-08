@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <!-- Statistics Cards -->
        <div class="row">
            <!-- Active Registrations -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Pendaftaran Aktif</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $unarchivedRegistrations }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Applications -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Pendaftar Aktif</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUnarchivedApplications }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Current Year Applications -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Pendaftar Tahun Ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $currentApplications }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Applications -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pendaftar 7 Hari Terakhir</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $recentApplications }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Gender Distribution Chart -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Distribusi Gender</h6>
                    </div>
                    <div class="card-body">
                        @if($maleCount > 0 || $femaleCount > 0)
                            <div class="chart-pie pt-4">
                                <canvas id="genderDistributionChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> Laki-laki ({{ $maleCount }})
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Perempuan ({{ $femaleCount }})
                                </span>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <p class="text-gray-500">Belum ada data pendaftar</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Applications by Registration Period -->
            <div class="col-lg-8 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pendaftar per Periode</h6>
                    </div>
                    <div class="card-body">
                        @if(count($applicationsByRegistration) > 0)
                            <div class="chart-bar">
                                <canvas id="registrationApplicationsChart"></canvas>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <p class="text-gray-500">Belum ada data pendaftar</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Latest Applications Table -->
            <div class="col-lg-7 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pendaftar Terbaru</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NISN</th>
                                        <th>Pendaftaran</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($latestApplications as $application)
                                        <tr>
                                            <td>{{ $application->full_name }}</td>
                                            <td>{{ $application->nisn }}</td>
                                            <td>{{ $application->registration->name }}</td>
                                            <td>{{ $application->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="{{ route('registrations.application', $application->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data pendaftar terbaru</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Registrations List -->
            <div class="col-lg-5 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pendaftaran Aktif</h6>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @forelse($openRegistrations as $registration)
                                <a href="{{ route('registrations.show', $registration->id) }}" 
                                   class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $registration->name }}</h5>
                                        <small>{{ $registration->applications->count() ?? 0 }} pendaftar</small>
                                    </div>
                                    <p class="mb-1">Tahun Ajaran: {{ $registration->academic_year }}</p>
                                    <small>Periode: {{ $registration->start_date->format('d/m/Y') }} - {{ $registration->end_date->format('d/m/Y') }}</small>
                                </a>
                            @empty
                                <div class="text-center py-3">
                                    <p>Tidak ada pendaftaran aktif</p>
                                    <a href="{{ route('registrations.create') }}" class="btn btn-sm btn-primary">Buat Pendaftaran</a>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Check if gender chart element exists
    const genderChartEl = document.getElementById('genderDistributionChart');
    if (genderChartEl) {
        const maleCount = {{ $maleCount }};
        const femaleCount = {{ $femaleCount }};
        
        if (maleCount > 0 || femaleCount > 0) {
            new Chart(genderChartEl, {
                type: 'doughnut',
                data: {
                    labels: ['Laki-laki', 'Perempuan'],
                    datasets: [{
                        data: [maleCount, femaleCount],
                        backgroundColor: ['#4e73df', '#1cc88a'],
                        hoverBackgroundColor: ['#2e59d9', '#17a673'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    cutout: '80%',
                }
            });
        }
    }

    // Check if registration applications chart element exists
    const applicationsChartEl = document.getElementById('registrationApplicationsChart');
    if (applicationsChartEl) {
        const labels = [
            @foreach($applicationsByRegistration as $registration)
                "{{ $registration->name }} ({{ $registration->academic_year }})",
            @endforeach
        ];
        
        const data = [
            @foreach($applicationsByRegistration as $registration)
                {{ $registration->applications_count }},
            @endforeach
        ];
        
        if (labels.length > 0) {
            new Chart(applicationsChartEl, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Pendaftar',
                        data: data,
                        backgroundColor: '#4e73df',
                        borderColor: '#4e73df',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        }
    }
});
</script>
@endpush