@extends('layouts.app')

@section('content')
    <section id="registration" class="registration section">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Registration Form</h2>
                <p>Please fill out the form below to register.</p>
            </div>
            <form action="#" method="POST" class="php-email-form">
                @csrf
                <div class="row gy-4">
                    <div class="col-md-6">
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="nisn" class="form-control" placeholder="NISN" required>
                    </div>
                    <div class="col-md-6">
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="" disabled selected>Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="col-md-6">
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <select name="agama" class="form-control" required>
                            <option value="" disabled selected>Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <textarea name="alamat_lengkap" class="form-control" rows="4" placeholder="Alamat Lengkap" required></textarea>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="nomor_telepon" class="form-control"
                            placeholder="Nomor Telepon/HP (Opsional)">
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control" placeholder="Email (Opsional)">
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn-get-started">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
