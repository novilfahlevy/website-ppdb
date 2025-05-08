@extends('admin.layouts.app')

@section('content')
    <a href="{{ route('registrations.create') }}" class="btn btn-primary mb-3">Tambah Pendaftaran</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftaran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Tahun Ajaran</th>
                            <th>Mulai Dari</th>
                            <th>Sampai Dengan</th>
                            <th>Status</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($registrations as $registration)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $registration->name }}</td>
                                <td>{{ $registration->academic_year ?: '-' }}</td>
                                <td>{{ $registration->start_date->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $registration->end_date->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $registration->is_open ? 'Dibuka' : 'Selesai' }}</td>
                                <td>{{ $registration->created_at->translatedFormat('l, d F Y H:i:s') }}</td>
                                <td>
                                    <a href="{{ route('registrations.edit', ['id' => $registration->id]) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('registrations.destroy', ['id' => $registration->id]) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus pendaftaran ini?')">Delete</button>
                                    </form>
                                    <a href="{{ route('registrations.show', ['id' => $registration->id]) }}"
                                        class="btn btn-sm btn-info btn-outline">Lihat Pendaftar</a>
                                    <form action="{{ route('registrations.unarchive', ['id' => $registration->id]) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-warning"
                                            onclick="return confirm('Apakah anda yakin ingin keluarkan pendaftaran ini dari arsip?')">Batalkan Arsip</button>
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
