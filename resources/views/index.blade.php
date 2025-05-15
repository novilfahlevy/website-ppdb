@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div id="hero" class="hero" style="background-image: url({{ asset('assets/WELCOME-TO-IMKA.png') }});">
    </div>
    <!-- /Hero Section -->

    <section id="pendaftaran">
        <div class="container position-relative">
            <div class="section-title text-center mb-5">
                <h2>Pendaftaran</h2>
                <p>Silahkan pilih jalur pendaftaran yang sesuai</p>
            </div>
            <div class="row justify-content-center gy-4 mt-3">
                @forelse ($registrations as $registration)
                    <div class="col-xl-3 col-md-6">
                        <div class="icon-box">
                            @if ($registration->is_open)
                                <div>
                                    <div class="icon"><i class="bi bi-person"></i></div>
                                    <p class="text-primary">(Sedang Berlangsung)</p>
                                </div>
                            @else
                                <div>
                                    <div class="icon"><i class="bi bi-check-circle text-success"></i></div>
                                    <p class="text-success">(Sudah Ditutup)</p>
                                </div>
                            @endif
                            <h4 class="title mb-2">
                                <a href="{{ route('registration', ['slug' => $registration->slug, 'tahunAjaran' => urlencode(str_replace('/', '-', $registration->academic_year))]) }}"
                                    class="stretched-link">
                                    {{ $registration->name }}
                                </a>
                            </h4>
                            <p class="text-white">Tahun Ajaran {{ $registration->academic_year }}</p>
                            <p class="text-white">
                                <b>{{ $registration->start_date->translatedFormat('d M Y') }}</b> s.d.
                                <b>{{ $registration->end_date->translatedFormat('d M Y') }}</b>
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-md-8">
                        <div class="alert alert-warning text-center py-5">
                            <i class="bi bi-info-circle fs-1 mb-3 d-block"></i>
                            <h4 class="alert-heading">Belum Ada Pendaftaran</h4>
                            <p class="mb-0">Saat ini belum ada jadwal pendaftaran yang tersedia. Silahkan periksa kembali di lain waktu.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Persyaratan Section -->
    <section id="persyaratan" class="light-background">
        <div class="container position-relative">
            <div class="section-title text-center mb-5">
                <h2>Syarat Pendaftaran</h2>
                <p>Persyaratan yang harus dipenuhi untuk pendaftaran</p>
            </div>

            <div class="row justify-content-center gy-4 mb-5">
                <div class="col-lg-6">
                    <div class="card shadow h-100">
                        <div class="card-header">
                            <h5 class="m-0 font-weight-bold">Untuk Siswa Baru</h5>
                        </div>
                        <div class="card-body">
                            <ol class="ps-3">
                                <li class="mb-2">Belum Menikah</li>
                                <li class="mb-2">Usia Kurang dari 21 tahun</li>
                                <li class="mb-2">Foto rapor / Surat Keterangan Lulus / Ijazah</li>
                                <li class="mb-2">Foto Akte</li>
                                <li class="mb-2">Foto KK</li>
                                <li class="mb-2">Foto Siswa</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card shadow h-100">
                        <div class="card-header">
                            <h5 class="m-0 font-weight-bold">Untuk Siswa Mutasi / Pindahan</h5>
                        </div>
                        <div class="card-body">
                            <ol class="ps-3">
                                <li class="mb-2">Belum Menikah</li>
                                <li class="mb-2">Surat Pindah dari sekolah Asal</li>
                                <li class="mb-2">Surat Kelakuan Baik</li>
                                <li class="mb-2">Surat Rekomendasi dari Balaidikmen asal (Bila dari DIY)</li>
                                <li class="mb-2">Surat rekomendasi dari Dinas Pendidikan Sekolah Asal (Bila dari luar Propinsi)</li>
                                <li class="mb-2">Surat Keterangan Bebas Narkoba</li>
                                <li class="mb-2">Fotokopi Ijazah dan SKHUN SMP</li>
                                <li class="mb-2">Fotokopi Rapor Terakhir</li>
                                <li class="mb-2">Fotokopi C1/KK, Perwalian</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dokumen Persyaratan -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header text-primary">
                            <h5 class="m-0 font-weight-bold">Dokumen Persyaratan</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-3">Berikut adalah dokumen-dokumen yang perlu disiapkan dalam format digital (PDF/JPG) untuk diunggah saat pendaftaran:</p>
                            
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-box-sm text-primary me-3">
                                                    <i class="bi bi-file-earmark-text"></i>
                                                </div>
                                                <h5 class="mb-0">Akta Kelahiran</h5>
                                            </div>
                                            <p class="text-muted small">Scan/foto Akta Kelahiran asli dengan format PDF/JPG, ukuran maks. 5MB.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-box-sm text-primary me-3">
                                                    <i class="bi bi-file-earmark-text"></i>
                                                </div>
                                                <h5 class="mb-0">Kartu Keluarga</h5>
                                            </div>
                                            <p class="text-muted small">Scan/foto Kartu Keluarga asli dengan format PDF/JPG, ukuran maks. 5MB.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-box-sm text-primary me-3">
                                                    <i class="bi bi-file-earmark-text"></i>
                                                </div>
                                                <h5 class="mb-0">Rapor</h5>
                                            </div>
                                            <p class="text-muted small">Scan/foto Rapor (halaman nilai dan identitas) dengan format PDF, ukuran maks. 5MB.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-box-sm text-primary me-3">
                                                    <i class="bi bi-person-badge"></i>
                                                </div>
                                                <h5 class="mb-0">Pas Foto</h5>
                                            </div>
                                            <p class="text-muted small">Pas foto terbaru ukuran 3x4 dengan latar belakang biru/merah, format JPG, ukuran maks. 1MB.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-box-sm text-primary me-3">
                                                    <i class="bi bi-trophy"></i>
                                                </div>
                                                <h5 class="mb-0">Sertifikat Prestasi</h5>
                                            </div>
                                            <p class="text-muted small">Scan/foto Sertifikat Prestasi (jika ada) dengan format PDF/JPG, ukuran maks. 5MB.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-box-sm text-primary me-3">
                                                    <i class="bi bi-geo-alt"></i>
                                                </div>
                                                <h5 class="mb-0">Surat Keterangan Domisili</h5>
                                            </div>
                                            <p class="text-muted small">Scan/foto Surat Keterangan Domisili (jika alamat berbeda dengan KK) dengan format PDF, ukuran maks. 5MB.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-box-sm text-primary me-3">
                                                    <i class="bi bi-cash"></i>
                                                </div>
                                                <h5 class="mb-0">Bukti Pembayaran</h5>
                                            </div>
                                            <p class="text-muted small">Scan/foto bukti pembayaran pendaftaran dengan format PDF/JPG, ukuran maks. 5MB.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-box-sm text-primary me-3">
                                                    <i class="bi bi-person-vcard"></i>
                                                </div>
                                                <h5 class="mb-0">Dokumen Penunjang</h5>
                                            </div>
                                            <p class="text-muted small">Dokumen tambahan sesuai persyaratan jalur pendaftaran dengan format PDF, ukuran maks. 5MB.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Catatan Penting -->
            {{-- <div class="row">
                <div class="col-12">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto pe-3">
                                    <i class="bi bi-exclamation-triangle-fill text-warning fs-1"></i>
                                </div>
                                <div class="col">
                                    <div class="font-weight-bold text-warning text-uppercase mb-1">Catatan Penting:</div>
                                    <ul class="mb-0">
                                        <li>Pastikan semua dokumen yang diunggah jelas dan dapat dibaca.</li>
                                        <li>Dokumen yang tidak lengkap dapat menyebabkan proses pendaftaran tertunda.</li>
                                        <li>Siapkan dokumen asli untuk dibawa saat verifikasi berkas.</li>
                                        <li>Format file yang diterima: PDF, JPG, atau PNG.</li>
                                        <li>Ukuran maksimal tiap file adalah 5MB.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- /Persyaratan Section -->

    <!-- Biaya Pendidikan Section -->
    <section id="biaya-pendidikan">
        <div class="container position-relative">
            <div class="section-title text-center mb-5">
                <h2>Biaya Pendidikan</h2>
                <p>Rincian biaya pendidikan yang perlu disiapkan</p>
            </div>

            <div class="row justify-content-center gy-4">
                <!-- Sumbangan Fasilitas Pendidikan Card -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-header bg-primary text-white py-3">
                            <h5 class="d-flex align-items-center m-0 font-weight-bold">
                                <i class="bi bi-building me-3"></i>
                                <p class="mb-0">Sumbangan Fasilitas Pendidikan</p>
                            </h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush mb-4">
                                @for ($i = 1; $i <= 5; $i++)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Pilihan {{ $i }}</span>
                                        <span class="badge bg-primary rounded-pill">Rp {{ number_format($fee->{'sfp_option_' . $i}, 0, ',', '.') }}</span>
                                    </li>
                                @endfor
                                <li class="list-group-item d-flex justify-content-between align-items-center fst-italic">
                                    <span>Atau sesuai kemampuan orang tua/wali</span>
                                </li>
                            </ul>
                            <div class="alert alert-info mb-0">
                                <i class="bi bi-info-circle me-2"></i>
                                Pembayaran dapat diangsur selama 3 tahun
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DPP Card -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-header bg-primary text-white py-3">
                            <h5 class="d-flex align-items-center m-0 font-weight-bold">
                                <i class="bi bi-cash-stack me-3"></i>
                                <p class="mb-0">Dana Pengembangan Pendidikan (DPP)</p>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <h1 class="display-6 fw-bold text-primary">Rp {{ number_format($fee->dpp_amount, 0, ',', '.') }}</h1>
                            </div>
                            
                            <p class="fw-bold mb-2">Rincian DPP:</p>
                            <ul class="mb-4">
                                @foreach($fee->dpp_items as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                            
                            <div class="alert alert-info mb-0">
                                <i class="bi bi-info-circle me-2"></i>
                                Pembayaran dapat diangsur selama 3 tahun
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SPP Card -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-header bg-primary text-white py-3">
                            <h5 class="d-flex align-items-center m-0 font-weight-bold">
                                <i class="bi bi-calendar-check me-3"></i>
                                <p class="mb-0">Sumbangan Pembinaan Pendidikan (SPP)</p>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <h1 class="display-6 fw-bold text-primary">Rp {{ number_format($fee->spp_amount, 0, ',', '.') }}</h1>
                                <p class="text-muted">per bulan</p>
                            </div>
                            
                            <div class="alert alert-warning mb-3">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                Pembayaran SPP dilakukan sebelum tanggal 15 setiap bulannya
                            </div>
                            
                            <div class="alert alert-secondary mb-0">
                                <i class="bi bi-person-heart me-2"></i>
                                <strong>Keringanan biaya</strong> dapat diberikan setelah wawancara dan membawa surat keterangan tidak mampu dari kelurahan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Payment Methods -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h5 class="m-0 font-weight-bold">
                                <i class="bi bi-credit-card me-2"></i>
                                Metode Pembayaran
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h5>Pembayaran dapat dilakukan melalui:</h5>
                                    <ul>
                                        <li>Transfer bank ke rekening sekolah</li>
                                        <li>Pembayaran langsung di loket administrasi sekolah</li>
                                        <li>Aplikasi pembayaran online yang telah bekerja sama dengan sekolah</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <p class="fw-bold mb-1">Untuk informasi lebih lanjut, hubungi:</p>
                                        <p class="mb-1"><i class="bi bi-telephone me-2"></i> {{ $fee->payment_phone }}</p>
                                        <p class="mb-1"><i class="bi bi-envelope me-2"></i> {{ $fee->payment_email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Biaya Pendidikan Section -->
@endsection
