@extends('users.layouts.layout')

@push('style')
    <style>
        body {
            overflow-x: hidden
        }
    </style>
@endpush

@section('konten')
    <section id="banner" class="mb-5">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($banner as $index => $set)
                    <div class="carousel-item  @if ($loop->first) active @endif">
                        <img src="{{ URL::asset('storage/' . $set->img_path) }}" class="d-block w-100" alt="Slide 1">
                        <div class="carousel-caption">
                            <h5>{{ $set->subtitle }}</h5>
                            <p>{{ $set->description ?? 'Some placeholder content' }}</p>
                            <a href="{{ route('media') }}" class="btn btn-primary">Temukan Lebih Banyak</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        {{-- <div class="container-fluid">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12 col-md-6 mb-4 mb-md-0 text-center text-md-start">
                    <div class="container p-4">
                        <div class="title">
                            <h1 class="text-primary fw-bold text-title" style="font-size: 3em">Modul Ajar</h1>
                            <h5 class="text-primary text-title mt-3"><span class="text-warning text-sub">Dirancang untuk
                                    memenuhi
                                    kebutuhan persiapan
                                    pembelajaran yang anda butuhkan </span> sesuai dengan kurikulum fisika <span
                                    class="text-warning text-sub"> anda.</span>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center text-md-end">
                    <img src="{{ URL::asset('assets/img/banner-modul.png') }}" alt="Banner" class="img-fluid">
                </div>
            </div>
        </div> --}}
    </section>

    <section id="kelebihan1" class="d-none d-lg-block">
        <div class="row">
            <div class="col-3 col-md-3 col-sm-12 align-self-end">
                <img src="{{ URL::asset('assets/img/siswa.png') }}" class="w-75" alt="">
            </div>
            <div class="col-9 col-md-9 col-sm-12 mb-5">
                <div class="row me-5">
                    <div class="col-6 col-md-6 col-sm-12 align-self-end">
                        <h2 class="text-warning">Apasih Kelebihannya?</h2>
                    </div>

                    @forelse ($setting as $key => $item)
                        @if ($key == 0)
                            {{-- card 1 --}}
                            <div class="col-6 col-md-6 col-sm-12 justify-self-start">
                                <div class="container bg-warning d-flex align-items-center justify-content-center card-kanan"
                                    style="height: 15em; border-radius: 0px 3em 3em 0px;">
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

                <div class="row align-items-end me-5 mt-4">
                    @forelse ($setting as $key => $item)
                        @if ($key == 1 || $key == 2)
                            {{-- card 2 or card 3 --}}
                            <div class="col-6 justify-self-start">
                                <div class="container bg-warning d-flex align-items-center justify-content-center card-kanan"
                                    style="height: 15em; border-radius: {{ $key == 1 ? '3em 0em 0em 3em' : '0px 3em 3em 0px' }};">
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
    </section>


    <section id="kelebihan2" class="d-lg-none">
        <div class="row">
            <div class="col-12 col-md-3 align-self-end text-center mb-4 mb-md-0">
                <img src="{{ URL::asset('assets/img/siswa.png') }}" class="img-fluid w-75" alt="Siswa">
            </div>
            <div class="col-12 col-md-9 mb-5">
                <div class="row me-0 me-md-5">
                    <div class="col-12 text-center text-md-start">
                        <h2 class="text-warning">Apasih Kelebihannya?</h2>
                    </div>

                    @forelse ($setting as $key => $item)
                        @if ($key == 0)
                            {{-- card 1 --}}
                            <div class="col-12 col-md-6 mt-4">
                                <div class="container bg-warning d-flex align-items-center justify-content-center card-kanan"
                                    style="height: 15em; border-radius: 0px 3em 3em 0px;">
                                    <h5 class="fw-bold title-depan text-center">{{ $item->subtitle }}</h5>
                                    <div class="title-belakang text-center">
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

                <div class="row align-items-end me-0 me-md-5 mt-4">
                    @forelse ($setting as $key => $item)
                        @if ($key == 1 || $key == 2)
                            {{-- card 2 or card 3 --}}
                            <div class="col-12 col-md-6 mt-4">
                                <div class="container bg-warning d-flex align-items-center justify-content-center card-kanan"
                                    style="height: 15em; border-radius: {{ $key == 1 ? '3em 0em 0em 3em' : '0px 3em 3em 0px' }};">
                                    <h5 class="fw-bold title-depan text-center">{{ $item->subtitle }}</h5>
                                    <div class="title-belakang text-center">
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
    </section>


    <section id="kontak" class="mb-4 bg-web-primary py-5">
        <div class="container-fluid">
            <div class="row d-flex align-items-center text-center text-md-start">
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <img src="{{ URL::asset('assets/img/kontak.png') }}" class="w-75" alt="">
                </div>
                <div class="col-12 col-md-6">
                    <h4 class="text-warning">Gabung sekarang dan rasakan sendiri bagaimana SPINET dapat mengubah cara
                        anda belajar dan mengajar Fisika.</h4>
                    <p>Jangan ragu untuk menghubungi, kami dengan senang hati siap membantu!</p>
                    <button class="btn btn-primary">Kontak Kami</button>
                </div>
            </div>
        </div>
    </section>

    <section id="media" class="d-flex flex-column align-items-center justify-content-center py-5">
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
