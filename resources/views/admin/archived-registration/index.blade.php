@extends('admin.layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div
            class="card-header d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">Data Arsip Pendaftaran</h6>
            <form method="GET" action="{{ route('registrations.archived.index') }}"
            class="d-inline-block d-flex align-items-center" style="max-width: 300px;">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                <span class="input-group-text bg-white border-right-0">
                    <i class="fas fa-search"></i>
                </span>
                </div>
                <input type="text" name="cari" class="form-control border-left-0"
                placeholder="Cari nama dan tahun ajaran..." value="{{ request('cari') }}">
            </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th scope="col" style="min-width: 200px;">Nama</th>
                            <th scope="col" style="min-width: 200px;">Tahun Ajaran</th>
                            <th scope="col" style="min-width: 300px;">Mulai Dari</th>
                            <th scope="col" style="min-width: 300px;">Sampai Dengan</th>
                            <th scope="col" style="min-width: 150px;">Status</th>
                            <th scope="col" style="min-width: 300px;">Tanggal Dibuat</th>
                            <th scope="col" style="min-width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($registrations as $registration)
                            <tr>
                                <td>{{ ($registrations->currentpage() - 1) * $registrations->perpage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $registration->name }}</td>
                                <td>{{ $registration->academic_year ?: '-' }}</td>
                                <td>{{ $registration->start_date->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $registration->end_date->translatedFormat('l, d F Y') }}</td>
                                <td>
                                    @if ($registration->is_open)
                                        <span class="badge bg-success text-white">Dibuka</span>
                                    @else
                                        <span class="badge bg-danger text-white">Ditutup</span>
                                    @endif
                                </td>
                                <td>{{ $registration->created_at->translatedFormat('l, d F Y H:i') }}</td>
                                <td class="d-inline-flex flex-column" style="width: 200px;">
                                    <a href="{{ route('registrations.edit', ['id' => $registration->id]) }}"
                                        class="btn btn-sm btn-primary mb-2">Edit</a>
                                    <form action="{{ route('registrations.destroy', ['id' => $registration->id]) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger mb-2"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus pendaftaran ini?')">Hapus</button>
                                    </form>
                                    <a href="{{ route('registrations.show', ['id' => $registration->id]) }}"
                                        class="btn btn-sm btn-info btn-outline mb-2">Lihat Pendaftar</a>
                                    <form action="{{ route('registrations.unarchive', ['id' => $registration->id]) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-warning"
                                            onclick="return confirm('Apakah anda yakin ingin keluarkan pendaftaran ini dari arsip?')">Batalkan
                                            Arsip</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data pendaftaran yang diarsipkan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $registrations->links() }}
            </div>
        </div>
    </div>
@endsection
