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

    <section>
        <div class="container position-relative">
            <div class="row gy-4 mt-5">
                @foreach ($registrations as $registration)
                    <div class="col-xl-3 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-easel"></i></div>
                            <h4 class="title"><a href="{{ route('registration', ['slug' => $registration->slug]) }}"
                                    class="stretched-link">{{ $registration->name }}</a></h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
