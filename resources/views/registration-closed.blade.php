@extends('layouts.app')

@section('content')
    <section class="registration-page">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="registration-card card-closed text-center">
                        <img src="{{ asset('assets/closed-illustration.svg') }}" alt="Closed" class="registration-illustration"
                             onerror="this.onerror=null; this.src='https://cdn-icons-png.flaticon.com/512/6134/6134065.png'">
                        <p class="message">
                            Mohon maaf, pendaftaran untuk {{ $registration->name }} telah ditutup.
                            Periode pendaftaran telah berakhir.
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
