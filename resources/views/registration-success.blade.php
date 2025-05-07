@extends('layouts.app')

@section('content')
    <section class="registration-page">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="registration-card card-success text-center">
                        <img src="{{ asset('assets/success-illustration.svg') }}" alt="Success" class="registration-illustration" 
                             onerror="this.onerror=null; this.src='https://cdn-icons-png.flaticon.com/512/190/190411.png'">
                        <h2>Pendaftaran Berhasil!</h2>
                        <p class="message">
                            Terima kasih telah mendaftar di SMA Immanuel Kalasan. 
                            Data pendaftaran Anda telah kami terima dengan baik.
                            Tim kami akan segera memproses pendaftaran dan menghubungi Anda 
                            melalui email atau nomor telepon yang telah Anda berikan.
                        </p>
                        <a href="{{ route('home') }}" class="btn btn-primary action-btn">
                            <i class="bi bi-house me-2"></i>Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection