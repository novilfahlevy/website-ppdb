@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero" style="background-image: url('{{ asset('assets/banner.jpg') }}');">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-5">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h2 class="text-white">{{ config('app.name') }}</h2>
                    <p class="text-white">
                        Bersama kami mendidik buah hati anda dengan sepenuh hati demi tercapainya masa depan yang penuh
                        harapan.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- /Hero Section -->

    <section id="pendaftaran">
        <div class="container position-relative">
            <div class="text-center mb-5">
                <h2 class="section-title">Pendaftaran</h2>
                <p>Silahkan pilih jalur pendaftaran yang sesuai</p>
            </div>
            <div class="row justify-content-center gy-4 mt-3">
                @foreach ($registrations as $registration)
                    <div class="col-xl-3 col-md-6">
                        <div class="icon-box">
                            @if ($registration->is_open)
                                <div class="icon"><i class="bi bi-person"></i></div>
                            @else
                                <div class="icon"><i class="bi bi-check-circle"></i></div>
                            @endif
                            <h4 class="title">
                                <a href="{{ route('registration', ['slug' => $registration->slug]) }}"
                                    class="stretched-link">
                                    {{ $registration->name }}
                                </a>
                            </h4>
                            <p class="text-white">
                                {{ $registration->start_date->translatedFormat('d M Y') }} s.d.
                                {{ $registration->end_date->translatedFormat('d M Y') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
