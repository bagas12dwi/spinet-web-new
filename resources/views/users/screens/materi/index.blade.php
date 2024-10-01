@extends('users.layouts.layout')
@push('style')
    <style>
        body {
            overflow-x: hidden;
        }

        .title h1 {
            font-size: 3em;
        }

        .title h5 {
            font-size: 1.2em;
        }

        @media (min-width: 768px) {
            .title h1 {
                font-size: 4em;
            }

            .title h5 {
                font-size: 1.5em;
            }
        }

        @media (min-width: 992px) {
            .title h1 {
                font-size: 5em;
            }

            .title h5 {
                font-size: 1.8em;
            }
        }

        .card-kanan {
            height: auto;
            padding: 20px;
            border-radius: 0px 20px 20px 0px;
            margin-bottom: 20px;
        }

        @media (min-width: 768px) {
            .card-kanan {
                height: 15em;
            }
        }

        /* Adjustments for the 'Apasih Kelebihannya?' section */
        #kelebihan img {
            width: 100%;
            margin-bottom: 20px;
        }

        .container.bg-warning {
            padding: 20px;
            border-radius: 20px;
        }

        /* Adjustments for the 'Kontak' section */
        #kontak img {
            width: 100%;
            margin-bottom: 20px;
        }

        /* Responsive adjustments for quotes and media */
        #media h3 {
            font-size: 1.5em;
        }

        @media (min-width: 768px) {
            #media h3 {
                font-size: 2em;
            }
        }
    </style>
@endpush
@section('konten')
    <section id="banner">
        <div class="container-fluid">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="container p-4">
                        <div class="title">
                            <h1 class="text-primary fw-bold text-title">Materi Ajar</h1>
                            <h5 class="text-primary text-title"><span class="text-warning text-sub">Akses koleksi </span>
                                materi ajar yang komprehensif,
                                <span class="text-warning text-sub">termasuk </span>artikel, buku elektronik, dan ringkasan
                                <span class="text-warning text-sub">topik fisika.</span>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3 text-center text-md-end">
                    <img src="{{ URL::asset('assets/img/banner-modul.png') }}" class="img-fluid" alt="Banner">
                </div>
            </div>
        </div>
    </section>

    <section id="kelebihan">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-3 align-self-end mb-4">
                    <img src="{{ URL::asset('assets/img/siswa.png') }}" class="w-75" alt="">
                </div>
                <div class="col-sm-12 col-md-9 mb-5">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 align-self-end mb-3">
                            <h2 class="text-warning">Apasih Kelebihannya?</h2>
                        </div>

                        @forelse ($setting as $key => $item)
                            @if ($key == 0)
                                {{-- card 1 --}}
                                <div class="col-sm-12 col-md-6 mb-3">
                                    <div class="container bg-warning d-flex align-items-center justify-content-center card-kanan"
                                        style="border-radius: 0px 3em 3em 0px;">
                                        <h5 class="fw-bold title-depan">{{ $item->subtitle }}</h5>
                                        <div class="title-belakang">
                                            <h5 class="fw-bold title-belakang">{{ $item->subtitle }}</h5>
                                            <p>{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <p class="text-center">Tidak ada data</p>
                        @endforelse
                    </div>

                    <div class="row align-items-end mt-4">
                        @forelse ($setting as $key => $item)
                            @if ($key == 1 || $key == 2)
                                {{-- card 2 or card 3 --}}
                                <div class="col-sm-12 col-md-6 mb-3">
                                    <div class="container bg-warning d-flex align-items-center justify-content-center card-kanan"
                                        style="border-radius: {{ $key == 1 ? '3em 0em 0em 3em' : '0px 3em 3em 0px' }};">
                                        <h5 class="fw-bold title-depan">{{ $item->subtitle }}</h5>
                                        <div class="title-belakang">
                                            <h5 class="fw-bold title-belakang">{{ $item->subtitle }}</h5>
                                            <p>{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <p class="text-center">Tidak ada data</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="mb-4 bg-web-primary">
        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="col-sm-12 col-md-6 text-center text-md-start mb-3">
                    <img src="{{ URL::asset('assets/img/kontak.png') }}" class="img-fluid" alt="Kontak">
                </div>
                <div class="col-sm-12 col-md-6">
                    <h4 class="text-warning">Gabung sekarang dan rasakan sendiri bagaimana SPINET dapat mengubah cara
                        anda belajar dan mengajar Fisika.</h4>
                    <p>Jangan ragu untuk menghubungi, kami dengan senang hati siap membantu!</p>
                    <button class="btn btn-primary">Kontak Kami</button>
                </div>
            </div>
        </div>
    </section>

    <section id="media" class="d-flex flex-column align-items-center justify-content-center" style="min-height: 60vh">
        <div class="container text-center">
            <h3 class="text-warning mb-3 fw-bold">
                @php
                    $quotes = $setting->where('title', 'quotes')->first();
                @endphp
                "{{ $quotes->description }}"
            </h3>
            <a href="#" class="btn btn-primary">Buka Menu Media</a>
        </div>
    </section>
@endsection
