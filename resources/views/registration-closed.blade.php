@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Pendaftaran Ditutup</h2>
                <p>Maaf, pendaftaran untuk {{ $registration->name }} telah ditutup.</p>
            </div>
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
            </div>
        </div>
    </section>
@endsection
