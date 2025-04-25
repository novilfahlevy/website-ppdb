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
                            <th>Mulai Dari</th>
                            <th>Sampai Dengan</th>
                            <th>Status</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $registration->name }}</td>
                                <td>{{ $registration->start_date->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $registration->end_date->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $registration->is_open ? 'Dibuka' : 'Selesai' }}</td>
                                <td>{{ $registration->created_at->translatedFormat('l, d F Y H:i:s') }}</td>
                                <td>
                                    <a href="{{ route('registrations.edit', ['id' => $registration->id]) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('registrations.destroy', ['id' => $registration->id]) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
