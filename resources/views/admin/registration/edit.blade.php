@extends('admin.layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftaran</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('registrations.update', ['id' => $registration->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $registration->name }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="academic_year">Tahun Ajaran</label>
                    <input type="text" name="academic_year" id="academic_year" class="form-control" value="{{ $registration->academic_year }}" placeholder="Contoh: 2025/2026" required>
                    @error('academic_year')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="start_date">Mulai Dari</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $registration->start_date->format('Y-m-d') }}" required>
                    @error('start_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="end_date">Sampai Dengan</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $registration->end_date->format('Y-m-d') }}" required>
                    @error('end_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="is_open">Status</label>
                    <select name="is_open" class="form-control" id="is_open">
                        <option value="1" {{ $registration->is_open ? 'selected' : '' }}>Dibuka</option>
                        <option value="0" {{ !$registration->is_open ? 'selected' : '' }}>Selesai</option>
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
@endsection
