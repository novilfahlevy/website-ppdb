@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pendaftaran</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('registrations.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="academic_year">Tahun Ajaran</label>
                        <input type="text" name="academic_year" id="academic_year" class="form-control" placeholder="Contoh: 2025/2026" value="{{ old('academic_year') }}" required>
                        @error('academic_year')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="start_date">Mulai Dari</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}" required>
                        @error('start_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="end_date">Sampai Dengan</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}" required>
                        @error('end_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="is_open">Status</label>
                        <select name="is_open" id="is_open" required>
                            <option value="1" {{ old('is_open') == 1 ? 'selected' : '' }}>Dibuka</option>
                            <option value="0" {{ old('is_open') == 0 ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('is_open')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('registrations.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
