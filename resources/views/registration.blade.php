@extends('layouts.app')

@section('content')
    <section id="registration" class="registration section">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Formulir Pendaftaran <br>{{ $registration->name }}</h2>
                <p>Silakan isi formulir di bawah ini untuk mendaftar.</p>
            </div>
            
            <div class="d-flex align-items-center pb-3 mb-3" style="border-bottom: 1px solid #ccc;">
                <span class="text-danger me-2">*</span> <small>Wajib diisi</small>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('registration.store', ['slug' => request()->slug]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-12">
                                <label for="full_name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" id="full_name" name="full_name" class="form-control" value="{{ old('full_name') }}" required>
                                @error('full_name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="nisn" class="form-label">NISN <span class="text-danger">*</span></label>
                                <input type="text" id="nisn" name="nisn" class="form-control" value="{{ old('nisn') }}" required>
                                @error('nisn')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="gender" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select id="gender" name="gender" class="form-control" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('gender')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="birth_place" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" id="birth_place" name="birth_place" class="form-control" value="{{ old('birth_place') }}" required>
                                @error('birth_place')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="birth_date" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ old('birth_date') }}" required>
                                @error('birth_date')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="religion" class="form-label">Agama <span class="text-danger">*</span></label>
                                <select id="religion" name="religion" class="form-control" required>
                                    <option value="" disabled selected>Pilih Agama</option>
                                    <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ old('religion') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ old('religion') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ old('religion') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Konghucu" {{ old('religion') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                </select>
                                @error('religion')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="full_address" class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea id="full_address" name="full_address" class="form-control" rows="4" required>{{ old('full_address') }}</textarea>
                                @error('full_address')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="personal_phone_number" class="form-label">Nomor Telepon/HP (Opsional)</label>
                                <input type="text" id="personal_phone_number" name="personal_phone_number" class="form-control" value="{{ old('personal_phone_number') }}">
                                @error('personal_phone_number')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email (Opsional)</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="father_name" class="form-label">Nama Ayah <span class="text-danger">*</span></label>
                                <input type="text" id="father_name" name="father_name" class="form-control" value="{{ old('father_name') }}" required>
                                @error('father_name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="mother_name" class="form-label">Nama Ibu <span class="text-danger">*</span></label>
                                <input type="text" id="mother_name" name="mother_name" class="form-control" value="{{ old('mother_name') }}" required>
                                @error('mother_name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="parents_last_education" class="form-label">Pendidikan Terakhir Orang Tua <span class="text-danger">*</span></label>
                                <select id="parents_last_education" name="parents_last_education" class="form-control" required>
                                    <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                                    <option value="SD" {{ old('parents_last_education') == 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SMP" {{ old('parents_last_education') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                    <option value="SMA" {{ old('parents_last_education') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                    <option value="Diploma" {{ old('parents_last_education') == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                    <option value="Sarjana" {{ old('parents_last_education') == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                                    <option value="Magister" {{ old('parents_last_education') == 'Magister' ? 'selected' : '' }}>Magister</option>
                                    <option value="Doktor" {{ old('parents_last_education') == 'Doktor' ? 'selected' : '' }}>Doktor</option>
                                </select>
                                @error('parents_last_education')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="parents_occupation" class="form-label">Pekerjaan Orang Tua <span class="text-danger">*</span></label>
                                <select id="parents_occupation" name="parents_occupation" class="form-control" required>
                                    <option value="" disabled selected>Pilih Pekerjaan</option>
                                    <option value="PNS" {{ old('parents_occupation') == 'PNS' ? 'selected' : '' }}>PNS</option>
                                    <option value="TNI/Polri" {{ old('parents_occupation') == 'TNI/Polri' ? 'selected' : '' }}>TNI/Polri</option>
                                    <option value="Pegawai Swasta" {{ old('parents_occupation') == 'Pegawai Swasta' ? 'selected' : '' }}>Pegawai Swasta</option>
                                    <option value="Wiraswasta" {{ old('parents_occupation') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                    <option value="Petani" {{ old('parents_occupation') == 'Petani' ? 'selected' : '' }}>Petani</option>
                                    <option value="Nelayan" {{ old('parents_occupation') == 'Nelayan' ? 'selected' : '' }}>Nelayan</option>
                                    <option value="Buruh" {{ old('parents_occupation') == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                    <option value="Lainnya" {{ old('parents_occupation') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('parents_occupation')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="parents_address" class="form-label">Alamat Orang Tua (Opsional)</label>
                                <textarea id="parents_address" name="parents_address" class="form-control" rows="4">{{ old('parents_address') }}</textarea>
                                @error('parents_address')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="parents_phone_number" class="form-label">Nomor HP Orang Tua/Wali <span class="text-danger">*</span></label>
                                <input type="text" id="parents_phone_number" name="parents_phone_number" class="form-control" value="{{ old('parents_phone_number') }}" required>
                                @error('parents_phone_number')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="parents_income" class="form-label">Penghasilan Orang Tua (Opsional)</label>
                                <input type="text" id="parents_income" name="parents_income" class="form-control" value="{{ old('parents_income') }}" placeholder="Rp">
                                @error('parents_income')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="previous_school_name" class="form-label">Nama Sekolah Asal <span class="text-danger">*</span></label>
                                <input type="text" id="previous_school_name" name="previous_school_name" class="form-control" value="{{ old('previous_school_name') }}" required>
                                @error('previous_school_name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="previous_school_npsn" class="form-label">NPSN Sekolah Asal <span class="text-danger">*</span></label>
                                <input type="text" id="previous_school_npsn" name="previous_school_npsn" class="form-control" value="{{ old('previous_school_npsn') }}" required>
                                @error('previous_school_npsn')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="previous_school_address" class="form-label">Alamat Sekolah Asal <span class="text-danger">*</span></label>
                                <textarea id="previous_school_address" name="previous_school_address" class="form-control" rows="4" required>{{ old('previous_school_address') }}</textarea>
                                @error('previous_school_address')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="school_status" class="form-label">Status Sekolah <span class="text-danger">*</span></label>
                                <select id="school_status" name="school_status" class="form-control" required>
                                    <option value="" disabled selected>Pilih Status Sekolah</option>
                                    <option value="Negeri" {{ old('school_status') == 'Negeri' ? 'selected' : '' }}>Negeri</option>
                                    <option value="Swasta" {{ old('school_status') == 'Swasta' ? 'selected' : '' }}>Swasta</option>
                                </select>
                                @error('school_status')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="exam_participant_number" class="form-label">Nomor Peserta Ujian (Opsional)</label>
                                <input type="text" id="exam_participant_number" name="exam_participant_number" class="form-control" value="{{ old('exam_participant_number') }}">
                                @error('exam_participant_number')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="birth_certificate_filepath" class="form-label">Scan Akta Kelahiran <span class="text-danger">*</span></label>
                                <input type="file" id="birth_certificate_filepath" name="birth_certificate_filepath" class="form-control" required>
                                @error('birth_certificate_filepath')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="family_card_filepath" class="form-label">Scan Kartu Keluarga (KK) <span class="text-danger">*</span></label>
                                <input type="file" id="family_card_filepath" name="family_card_filepath" class="form-control" required>
                                @error('family_card_filepath')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="report_card_filepath" class="form-label">Scan Rapor (Semester Tertentu) <span class="text-danger">*</span></label>
                                <input type="file" id="report_card_filepath" name="report_card_filepath" class="form-control" required>
                                @error('report_card_filepath')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="recent_photo_filepath" class="form-label">Pas Foto Terbaru <span class="text-danger">*</span></label>
                                <input type="file" id="recent_photo_filepath" name="recent_photo_filepath" class="form-control" required>
                                @error('recent_photo_filepath')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="achievement_certificate_filepath" class="form-label">Sertifikat Prestasi (Opsional)</label>
                                <input type="file" id="achievement_certificate_filepath" name="achievement_certificate_filepath" class="form-control">
                                @error('achievement_certificate_filepath')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="domicile_certificate_filepath" class="form-label">Surat Keterangan Domisili (Opsional)</label>
                                <input type="file" id="domicile_certificate_filepath" name="domicile_certificate_filepath" class="form-control">
                                @error('domicile_certificate_filepath')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
