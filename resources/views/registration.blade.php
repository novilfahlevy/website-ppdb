@extends('layouts.app')

@section('content')
    <section id="registration" class="registration section">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Formulir Pendaftaran <br><br>{{ $registration->name }}<br>Tahun Ajaran {{ $registration->academic_year }}</h2>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4 d-none d-lg-block">
                    <div class="position-sticky" style="top: 150px;">
                        <div class="info-container d-flex flex-column align-items-center justify-content-center">
                            <div class="info-item d-flex aos-init aos-animate" role="button" data-aos="fade-up"
                                data-aos-delay="200"
                                onclick="document.getElementById('personal-information').scrollIntoView({ behavior: 'smooth' });">
                                <i class="bi bi-person flex-shrink-0"></i>
                                <div>
                                    <h3>Informasi Pribadi</h3>
                                    <p>Isi data pribadi Anda dengan benar.</p>
                                </div>
                            </div>

                            <div class="info-item d-flex aos-init aos-animate" role="button" data-aos="fade-up"
                                data-aos-delay="300"
                                onclick="document.getElementById('parent-information').scrollIntoView({ behavior: 'smooth' });">
                                <i class="bi bi-people flex-shrink-0"></i>
                                <div>
                                    <h3>Informasi Orang Tua</h3>
                                    <p>Berikan informasi tentang orang tua atau wali Anda.</p>
                                </div>
                            </div>

                            <div class="info-item d-flex aos-init aos-animate" role="button" data-aos="fade-up"
                                data-aos-delay="400"
                                onclick="document.getElementById('previous-school-information').scrollIntoView({ behavior: 'smooth' });">
                                <i class="bi bi-building flex-shrink-0"></i>
                                <div>
                                    <h3>Sekolah Asal</h3>
                                    <p>Masukkan informasi tentang sekolah asal Anda.</p>
                                </div>
                            </div>

                            <div class="info-item d-flex aos-init aos-animate" role="button" data-aos="fade-up"
                                data-aos-delay="500"
                                onclick="document.getElementById('documents').scrollIntoView({ behavior: 'smooth' });">
                                <i class="bi bi-file-earmark flex-shrink-0"></i>
                                <div>
                                    <h3>Dokumen</h3>
                                    <p>Unggah dokumen yang diperlukan untuk pendaftaran.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <form action="{{ route('registration.store', ['slug' => $registration->slug, 'tahunAjaran' => urlencode(str_replace('/', '-', $registration->academic_year))]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="d-flex align-items-center p-3 mb-3" style="border: 1px solid var(--accent-color);">
                            <span class="text-danger me-2">*</span> <small>Wajib diisi</small>
                        </div>

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Personal Information Card -->
                        <div class="card mb-4" id="personal-information">
                            <div class="card-header d-flex align-items-center">
                                <i class="bi bi-person text-white me-2"></i>
                                <h5 class="mb-0">Informasi Pribadi</h5>
                            </div>
                            <div class="card-body">
                                <div class="row gy-4">
                                    <div class="col-12">
                                        <label for="full_name" class="form-label">Nama Lengkap <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="full_name" name="full_name" class="form-control"
                                            value="{{ old('full_name') }}" required>
                                        @error('full_name')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="nisn" class="form-label">NISN <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="nisn" name="nisn" class="form-control"
                                            value="{{ old('nisn') }}" required>
                                        @error('nisn')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="gender" class="form-label">Jenis Kelamin <span
                                                class="text-danger">*</span></label>
                                        <select id="gender" name="gender" class="form-control" required>
                                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                        @error('gender')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="birth_place" class="form-label">Tempat Lahir <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="birth_place" name="birth_place" class="form-control"
                                            value="{{ old('birth_place') }}" required>
                                        @error('birth_place')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="birth_date" class="form-label">Tanggal Lahir <span
                                                class="text-danger">*</span></label>
                                        <input type="date" id="birth_date" name="birth_date" class="form-control"
                                            value="{{ old('birth_date') }}" required>
                                        @error('birth_date')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="religion" class="form-label">Agama <span
                                                class="text-danger">*</span></label>
                                        <select id="religion" name="religion" class="form-control" required>
                                            <option value="" disabled selected>Pilih Agama</option>
                                            <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>
                                                Islam
                                            </option>
                                            <option value="Kristen" {{ old('religion') == 'Kristen' ? 'selected' : '' }}>
                                                Kristen</option>
                                            <option value="Katolik" {{ old('religion') == 'Katolik' ? 'selected' : '' }}>
                                                Katolik</option>
                                            <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>
                                                Hindu
                                            </option>
                                            <option value="Buddha" {{ old('religion') == 'Buddha' ? 'selected' : '' }}>
                                                Buddha</option>
                                            <option value="Konghucu"
                                                {{ old('religion') == 'Konghucu' ? 'selected' : '' }}>
                                                Konghucu</option>
                                        </select>
                                        @error('religion')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="full_address" class="form-label">Alamat Lengkap <span
                                                class="text-danger">*</span></label>
                                        <textarea id="full_address" name="full_address" class="form-control" rows="4" required>{{ old('full_address') }}</textarea>
                                        @error('full_address')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="current_domicile" class="form-label">Domisili Sekarang <span
                                                class="text-danger">*</span></label>
                                        <textarea id="current_domicile" name="current_domicile" class="form-control" rows="4" required>{{ old('current_domicile') }}</textarea>
                                        @error('current_domicile')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="personal_phone_number" class="form-label">Nomor Telepon/HP
                                            <span class="text-danger">*</span></label>
                                        <input type="text" id="personal_phone_number" name="personal_phone_number"
                                            class="form-control" value="{{ old('personal_phone_number') }}" required>
                                        @error('personal_phone_number')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email (Opsional)</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Parent Information Card -->
                        <div class="card mb-4" id="parent-information">
                            <div class="card-header d-flex align-items-center">
                                <i class="bi bi-people text-white me-2"></i>
                                <h5>Informasi Orang Tua</h5>
                            </div>
                            <div class="card-body">
                                <div class="row gy-4">
                                    <div class="col-12">
                                        <label for="father_name" class="form-label">Nama Ayah <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="father_name" name="father_name" class="form-control"
                                            value="{{ old('father_name') }}" required>
                                        @error('father_name')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="mother_name" class="form-label">Nama Ibu <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="mother_name" name="mother_name" class="form-control"
                                            value="{{ old('mother_name') }}" required>
                                        @error('mother_name')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="parents_last_education" class="form-label">Pendidikan Terakhir Orang
                                            Tua <span class="text-danger">*</span></label>
                                        <select id="parents_last_education" name="parents_last_education"
                                            class="form-control" required>
                                            <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                                            <option value="SD"
                                                {{ old('parents_last_education') == 'SD' ? 'selected' : '' }}>SD</option>
                                            <option value="SMP"
                                                {{ old('parents_last_education') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                            <option value="SMA"
                                                {{ old('parents_last_education') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                            <option value="Diploma"
                                                {{ old('parents_last_education') == 'Diploma' ? 'selected' : '' }}>Diploma
                                            </option>
                                            <option value="Sarjana"
                                                {{ old('parents_last_education') == 'Sarjana' ? 'selected' : '' }}>Sarjana
                                            </option>
                                            <option value="Magister"
                                                {{ old('parents_last_education') == 'Magister' ? 'selected' : '' }}>
                                                Magister</option>
                                            <option value="Doktor"
                                                {{ old('parents_last_education') == 'Doktor' ? 'selected' : '' }}>Doktor
                                            </option>
                                        </select>
                                        @error('parents_last_education')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="parents_occupation" class="form-label">Pekerjaan Orang Tua <span
                                                class="text-danger">*</span></label>
                                        <select id="parents_occupation" name="parents_occupation" class="form-control" onchange="toggleOtherOccupation()" required>
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
                                    <div class="col-12" id="other_occupation_div" style="display: {{ old('parents_occupation') == 'Lainnya' ? 'block' : 'none' }};">
                                        <label for="parents_occupation_other" class="form-label">Pekerjaan Lainnya <span class="text-danger">*</span></label>
                                        <input type="text" id="parents_occupation_other" name="parents_occupation_other"
                                            class="form-control" value="{{ old('parents_occupation_other') }}">
                                        @error('parents_occupation_other')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="parents_address" class="form-label">Alamat Orang Tua
                                            (Opsional)</label>
                                        <textarea id="parents_address" name="parents_address" class="form-control" rows="4">{{ old('parents_address') }}</textarea>
                                        @error('parents_address')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="parents_phone_number" class="form-label">Nomor HP Orang Tua/Wali <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="parents_phone_number" name="parents_phone_number"
                                            class="form-control" value="{{ old('parents_phone_number') }}" required>
                                        @error('parents_phone_number')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="parents_income" class="form-label">Penghasilan Orang Tua
                                            (Opsional)</label>
                                        <select id="parents_income" name="parents_income" class="form-control">
                                            <option value="" disabled selected>Pilih Penghasilan</option>
                                            <option value="< Rp 1.000.000"
                                                {{ old('parents_income') == '< Rp 1.000.000' ? 'selected' : '' }}>
                                                < Rp 1.000.000</option>
                                            <option value="Rp 1.000.000 - Rp 3.000.000"
                                                {{ old('parents_income') == 'Rp 1.000.000 - Rp 3.000.000' ? 'selected' : '' }}>
                                                Rp 1.000.000 - Rp 3.000.000</option>
                                            <option value="Rp 3.000.000 - Rp 5.000.000"
                                                {{ old('parents_income') == 'Rp 3.000.000 - Rp 5.000.000' ? 'selected' : '' }}>
                                                Rp 3.000.000 - Rp 5.000.000</option>
                                            <option value="Rp 5.000.000 - Rp 10.000.000"
                                                {{ old('parents_income') == 'Rp 5.000.000 - Rp 10.000.000' ? 'selected' : '' }}>
                                                Rp 5.000.000 - Rp 10.000.000</option>
                                            <option value="> Rp 10.000.000"
                                                {{ old('parents_income') == '> Rp 10.000.000' ? 'selected' : '' }}>
                                                > Rp 10.000.000</option>
                                        </select>
                                        @error('parents_income')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Previous School Information Card -->
                        <div class="card mb-4" id="previous-school-information">
                            <div class="card-header d-flex align-items-center">
                                <i class="bi bi-building text-white me-2"></i>
                                <h5>Informasi Sekolah Asal</h5>
                            </div>
                            <div class="card-body">
                                <div class="row gy-4">
                                    <div class="col-12">
                                        <label for="previous_school_name" class="form-label">Nama Sekolah Asal <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="previous_school_name" name="previous_school_name"
                                            class="form-control" value="{{ old('previous_school_name') }}" required>
                                        @error('previous_school_name')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="previous_school_address" class="form-label">Alamat Sekolah Asal <span
                                                class="text-danger">*</span></label>
                                        <textarea id="previous_school_address" name="previous_school_address" class="form-control" rows="4" required>{{ old('previous_school_address') }}</textarea>
                                        @error('previous_school_address')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="school_status" class="form-label">Status Sekolah <span
                                                class="text-danger">*</span></label>
                                        <select id="school_status" name="school_status" class="form-control" required>
                                            <option value="" disabled selected>Pilih Status Sekolah</option>
                                            <option value="Negeri"
                                                {{ old('school_status') == 'Negeri' ? 'selected' : '' }}>Negeri</option>
                                            <option value="Swasta"
                                                {{ old('school_status') == 'Swasta' ? 'selected' : '' }}>Swasta</option>
                                        </select>
                                        @error('school_status')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Documents Card -->
                        <div class="card mb-4" id="documents">
                            <div class="card-header d-flex align-items-center">
                                <i class="bi bi-file-earmark text-white me-2"></i>
                                <h5>Dokumen</h5>
                            </div>
                            <div class="card-body">
                                <div class="row gy-4">
                                    <div class="col-12">
                                        <label for="birth_certificate_filepath" class="form-label">Scan Akta Kelahiran (Opsional)</label>
                                        <input type="file" id="birth_certificate_filepath"
                                            name="birth_certificate_filepath" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                                        @error('birth_certificate_filepath')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="family_card_filepath" class="form-label">Scan Kartu Keluarga (KK) (Opsional)</label>
                                        <input type="file" id="family_card_filepath" name="family_card_filepath"
                                            class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                                        @error('family_card_filepath')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="report_card_filepath" class="form-label">Scan Rapor (Opsional)</label>
                                        <input type="file" id="report_card_filepath" name="report_card_filepath"
                                            class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                                        @error('report_card_filepath')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="recent_photo_filepath" class="form-label">Pas Foto Terbaru (Opsional)</label>
                                        <input type="file" id="recent_photo_filepath" name="recent_photo_filepath"
                                            class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                                        @error('recent_photo_filepath')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="achievement_certificate_filepath" class="form-label">Sertifikat
                                            Prestasi (Opsional)</label>
                                        <input type="file" id="achievement_certificate_filepath"
                                            name="achievement_certificate_filepath" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                                        @error('achievement_certificate_filepath')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="domicile_certificate_filepath" class="form-label">Surat Keterangan
                                            Domisili (Opsional)</label>
                                        <input type="file" id="domicile_certificate_filepath"
                                            name="domicile_certificate_filepath" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                                        @error('domicile_certificate_filepath')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Card -->
                        <div class="card mb-4" id="documents">
                            <div class="card-header d-flex align-items-center">
                                <i class="bi bi-file-earmark text-white me-2"></i>
                                <h5>Pembayaran</h5>
                            </div>
                            <div class="card-body">
                                <div class="row gy-4">
                                    <div class="col-12">
                                        <label for="proof_of_payment_filepath" class="form-label">Bukti Pembayaran <span class="text-danger">*</span></label>
                                        <input type="file" id="proof_of_payment_filepath"
                                            name="proof_of_payment_filepath" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                                        @error('proof_of_payment_filepath')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function toggleOtherOccupation() {
        const occupation = document.getElementById('parents_occupation').value;
        const otherDiv = document.getElementById('other_occupation_div');
        const otherInput = document.getElementById('parents_occupation_other');
        
        if (occupation === 'Lainnya') {
            otherDiv.style.display = 'block';
            otherInput.required = true;
            // Make sure the field is not empty
            if (otherInput.value.trim() === '') {
                otherInput.value = '';
            }
        } else {
            otherDiv.style.display = 'none';
            otherInput.required = false;
            // Clear the field when not needed
            otherInput.value = '';
        }
    }

    // Call on page load to handle initial state
    document.addEventListener('DOMContentLoaded', toggleOtherOccupation);
</script>
@endpush
