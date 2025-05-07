@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('registrations.index') }}">Pendaftaran</a></li>
                <li class="breadcrumb-item">
                    <a
                        href="{{ route('registrations.show', $application->registration_id) }}">{{ $application->registration->name }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('registrations.application', ['id' => $application->id]) }}">
                        Data pendaftaran <b>{{ $application->full_name }}</b>
                    </a>
                </li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>

        <form action="{{ route('registrations.applications.update', ['id' => $application->id]) }}" method="POST"
            class="w-100">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Personal Information Card -->
                <div class="col-xl-6 col-lg-6 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pribadi</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12 mb-3">
                                    <label for="full_name" class="form-label">Nama Lengkap <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="full_name" name="full_name" class="form-control"
                                        value="{{ old('full_name', $application->full_name) }}" required>
                                    @error('full_name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="nisn" class="form-label">NISN <span class="text-danger">*</span></label>
                                    <input type="text" id="nisn" name="nisn" class="form-control"
                                        value="{{ old('nisn', $application->nisn) }}" required>
                                    @error('nisn')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin <span
                                            class="text-danger">*</span></label>
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="" disabled>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki"
                                            {{ old('gender', $application->gender) == 'Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="Perempuan"
                                            {{ old('gender', $application->gender) == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="birth_place" class="form-label">Tempat Lahir <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="birth_place" name="birth_place" class="form-control"
                                        value="{{ old('birth_place', $application->birth_place) }}" required>
                                    @error('birth_place')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="birth_date" class="form-label">Tanggal Lahir <span
                                            class="text-danger">*</span></label>
                                    <input type="date" id="birth_date" name="birth_date" class="form-control"
                                        value="{{ old('birth_date', $application->birth_date->format('Y-m-d')) }}"
                                        required>
                                    @error('birth_date')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="religion" class="form-label">Agama <span
                                            class="text-danger">*</span></label>
                                    <select id="religion" name="religion" class="form-control" required>
                                        <option value="" disabled>Pilih Agama</option>
                                        <option value="Islam"
                                            {{ old('religion', $application->religion) == 'Islam' ? 'selected' : '' }}>
                                            Islam</option>
                                        <option value="Kristen"
                                            {{ old('religion', $application->religion) == 'Kristen' ? 'selected' : '' }}>
                                            Kristen</option>
                                        <option value="Katolik"
                                            {{ old('religion', $application->religion) == 'Katolik' ? 'selected' : '' }}>
                                            Katolik</option>
                                        <option value="Hindu"
                                            {{ old('religion', $application->religion) == 'Hindu' ? 'selected' : '' }}>
                                            Hindu</option>
                                        <option value="Buddha"
                                            {{ old('religion', $application->religion) == 'Buddha' ? 'selected' : '' }}>
                                            Buddha</option>
                                        <option value="Konghucu"
                                            {{ old('religion', $application->religion) == 'Konghucu' ? 'selected' : '' }}>
                                            Konghucu</option>
                                    </select>
                                    @error('religion')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="full_address" class="form-label">Alamat Lengkap <span
                                            class="text-danger">*</span></label>
                                    <textarea id="full_address" name="full_address" class="form-control" rows="4" required>{{ old('full_address', $application->full_address) }}</textarea>
                                    @error('full_address')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="current_domicile" class="form-label">Domisili Sekarang <span
                                            class="text-danger">*</span></label>
                                    <textarea id="current_domicile" name="current_domicile" class="form-control" rows="4" required>{{ old('current_domicile', $application->current_domicile) }}</textarea>
                                    @error('current_domicile')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="personal_phone_number" class="form-label">Nomor Telepon/HP <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="personal_phone_number" name="personal_phone_number"
                                        class="form-control"
                                        value="{{ old('personal_phone_number', $application->personal_phone_number) }}"
                                        required>
                                    @error('personal_phone_number')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ old('email', $application->email) }}">
                                    @error('email')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Parent Information Card -->
                <div class="col-xl-6 col-lg-6 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Orang Tua</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12 mb-3">
                                    <label for="father_name" class="form-label">Nama Ayah <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="father_name" name="father_name" class="form-control"
                                        value="{{ old('father_name', $application->father_name) }}" required>
                                    @error('father_name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="mother_name" class="form-label">Nama Ibu <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="mother_name" name="mother_name" class="form-control"
                                        value="{{ old('mother_name', $application->mother_name) }}" required>
                                    @error('mother_name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="parents_last_education" class="form-label">Pendidikan Terakhir Orang Tua
                                        <span class="text-danger">*</span></label>
                                    <select id="parents_last_education" name="parents_last_education"
                                        class="form-control" required>
                                        <option value="" disabled>Pilih Pendidikan Terakhir</option>
                                        <option value="SD"
                                            {{ old('parents_last_education', $application->parents_last_education) == 'SD' ? 'selected' : '' }}>
                                            SD</option>
                                        <option value="SMP"
                                            {{ old('parents_last_education', $application->parents_last_education) == 'SMP' ? 'selected' : '' }}>
                                            SMP</option>
                                        <option value="SMA"
                                            {{ old('parents_last_education', $application->parents_last_education) == 'SMA' ? 'selected' : '' }}>
                                            SMA</option>
                                        <option value="Diploma"
                                            {{ old('parents_last_education', $application->parents_last_education) == 'Diploma' ? 'selected' : '' }}>
                                            Diploma</option>
                                        <option value="Sarjana"
                                            {{ old('parents_last_education', $application->parents_last_education) == 'Sarjana' ? 'selected' : '' }}>
                                            Sarjana</option>
                                        <option value="Magister"
                                            {{ old('parents_last_education', $application->parents_last_education) == 'Magister' ? 'selected' : '' }}>
                                            Magister</option>
                                        <option value="Doktor"
                                            {{ old('parents_last_education', $application->parents_last_education) == 'Doktor' ? 'selected' : '' }}>
                                            Doktor</option>
                                    </select>
                                    @error('parents_last_education')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="parents_occupation" class="form-label">Pekerjaan Orang Tua <span
                                            class="text-danger">*</span></label>
                                    <select id="parents_occupation" name="parents_occupation" class="form-control"
                                        onchange="toggleOtherOccupation()" required>
                                        <option value="" disabled>Pilih Pekerjaan</option>
                                        <option value="PNS"
                                            {{ old('parents_occupation', $application->parents_occupation) == 'PNS' ? 'selected' : '' }}>
                                            PNS</option>
                                        <option value="TNI/Polri"
                                            {{ old('parents_occupation', $application->parents_occupation) == 'TNI/Polri' ? 'selected' : '' }}>
                                            TNI/Polri</option>
                                        <option value="Pegawai Swasta"
                                            {{ old('parents_occupation', $application->parents_occupation) == 'Pegawai Swasta' ? 'selected' : '' }}>
                                            Pegawai Swasta</option>
                                        <option value="Wiraswasta"
                                            {{ old('parents_occupation', $application->parents_occupation) == 'Wiraswasta' ? 'selected' : '' }}>
                                            Wiraswasta</option>
                                        <option value="Petani"
                                            {{ old('parents_occupation', $application->parents_occupation) == 'Petani' ? 'selected' : '' }}>
                                            Petani</option>
                                        <option value="Nelayan"
                                            {{ old('parents_occupation', $application->parents_occupation) == 'Nelayan' ? 'selected' : '' }}>
                                            Nelayan</option>
                                        <option value="Buruh"
                                            {{ old('parents_occupation', $application->parents_occupation) == 'Buruh' ? 'selected' : '' }}>
                                            Buruh</option>
                                        <option value="Lainnya"
                                            {{ old('parents_occupation', $application->parents_occupation) == 'Lainnya' ? 'selected' : '' }}>
                                            Lainnya</option>
                                    </select>
                                    @error('parents_occupation')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3" id="other_occupation_div" style="display: none;">
                                    <label for="parents_occupation_other" class="form-label">Pekerjaan Lainnya <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="parents_occupation_other" name="parents_occupation_other"
                                        class="form-control"
                                        value="{{ old('parents_occupation_other', $application->parents_occupation_other) }}">
                                    @error('parents_occupation_other')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="parents_address" class="form-label">Alamat Orang Tua</label>
                                    <textarea id="parents_address" name="parents_address" class="form-control" rows="4">{{ old('parents_address', $application->parents_address) }}</textarea>
                                    @error('parents_address')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="parents_phone_number" class="form-label">Nomor HP Orang Tua/Wali <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="parents_phone_number" name="parents_phone_number"
                                        class="form-control"
                                        value="{{ old('parents_phone_number', $application->parents_phone_number) }}"
                                        required>
                                    @error('parents_phone_number')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="parents_income" class="form-label">Penghasilan Orang Tua</label>
                                    <select id="parents_income" name="parents_income" class="form-control">
                                        <option value="" disabled>Pilih Penghasilan</option>
                                        <option value="< Rp 1.000.000"
                                            {{ old('parents_income', $application->parents_income) == '< Rp 1.000.000' ? 'selected' : '' }}>
                                            < Rp 1.000.000</option>
                                        <option value="Rp 1.000.000 - Rp 3.000.000"
                                            {{ old('parents_income', $application->parents_income) == 'Rp 1.000.000 - Rp 3.000.000' ? 'selected' : '' }}>
                                            Rp 1.000.000 - Rp 3.000.000</option>
                                        <option value="Rp 3.000.000 - Rp 5.000.000"
                                            {{ old('parents_income', $application->parents_income) == 'Rp 3.000.000 - Rp 5.000.000' ? 'selected' : '' }}>
                                            Rp 3.000.000 - Rp 5.000.000</option>
                                        <option value="Rp 5.000.000 - Rp 10.000.000"
                                            {{ old('parents_income', $application->parents_income) == 'Rp 5.000.000 - Rp 10.000.000' ? 'selected' : '' }}>
                                            Rp 5.000.000 - Rp 10.000.000</option>
                                        <option value="> Rp 10.000.000"
                                            {{ old('parents_income', $application->parents_income) == '> Rp 10.000.000' ? 'selected' : '' }}>
                                            > Rp 10.000.000</option>
                                    </select>
                                    @error('parents_income')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Previous School Information Card -->
                <div class="col-xl-12 col-lg-12 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Sekolah Asal</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12 mb-3">
                                    <label for="previous_school_name" class="form-label">Nama Sekolah Asal <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="previous_school_name" name="previous_school_name"
                                        class="form-control"
                                        value="{{ old('previous_school_name', $application->previous_school_name) }}"
                                        required>
                                    @error('previous_school_name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="previous_school_address" class="form-label">Alamat Sekolah Asal <span
                                            class="text-danger">*</span></label>
                                    <textarea id="previous_school_address" name="previous_school_address" class="form-control" rows="4" required>{{ old('previous_school_address', $application->previous_school_address) }}</textarea>
                                    @error('previous_school_address')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="school_status" class="form-label">Status Sekolah <span
                                            class="text-danger">*</span></label>
                                    <select id="school_status" name="school_status" class="form-control" required>
                                        <option value="" disabled>Pilih Status Sekolah</option>
                                        <option value="Negeri"
                                            {{ old('school_status', $application->school_status) == 'Negeri' ? 'selected' : '' }}>
                                            Negeri</option>
                                        <option value="Swasta"
                                            {{ old('school_status', $application->school_status) == 'Swasta' ? 'selected' : '' }}>
                                            Swasta</option>
                                    </select>
                                    @error('school_status')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-end mb-4">
                    <a href="{{ route('registrations.application', ['id' => $application->id]) }}"
                        class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
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
