@extends('users.layouts.layout')

@section('konten')
    <section id="banner">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="container p-4 text-center text-md-start">
                <div class="title">
                    <h2 class="text-title text-primary mb-5">
                        <span class="text-warning text-sub">Solusi untuk pengalaman</span> belajar fisika yang lebih
                        interaktif dan menyenangkan!
                    </h2>
                </div>
                <h5 class="text-primary mb-3">
                    Jelajahi berbagai fitur dan materi yang kami tawarkan untuk meningkatkan pengalaman belajar mengajar
                    Anda.
                </h5>
                <a href="#terbaru" class="btn btn-primary">Temukan Lebih Banyak</a>
            </div>
            <img src="{{ URL::asset('assets/img/banner.png') }}" class="img-fluid w-100 w-md-50" alt="Banner">
        </div>
        <div class="container-fluid bg-web-primary mb-3" style="height: 20vh"></div>
    </section>

    <section id="mengapa" class="mb-4 d-flex align-items-center" style="height: auto">
        <div class="container">
            <h4 class="text-warning mb-4 fw-bold">Mengapa harus Spinet?</h4>
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card card-mengapa card-shadow">
                        <div
                            class="card-body text-center py-4 d-flex align-items-center flex-column justify-content-center">
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/icons/interaktif.png') }}" style="width: 7em"
                                    alt="">
                            </div>
                            <div class="fw-bold">Pengalaman Interaktif</div>
                            <div class="hover-text">Temukan modul dan materi pembelajaran interaktif yang menjadikan belajar
                                fisika lebih menarik.</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card card-mengapa card-shadow">
                        <div
                            class="card-body text-center py-4 d-flex align-items-center flex-column justify-content-center">
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/icons/navigasi.png') }}" style="width: 7em" alt="">
                            </div>
                            <div class="fw-bold">Navigasi yang mudah</div>
                            <div class="hover-text">Jelajahi semua fitur dengan mudah melalui menu yang dirancang untuk
                                kemudahan pengguna.</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card card-mengapa card-shadow">
                        <div
                            class="card-body text-center py-4 d-flex align-items-center flex-column justify-content-center">
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/icons/konten.png') }}" style="width: 7em" alt="">
                            </div>
                            <div class="fw-bold">Konten Berkualitas</div>
                            <div class="hover-text">Nikmati akses ke media pembelajaran yang disesuaikan dengan kurikulum
                                untuk meningkatkan pengalaman belajar.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="mb-4 bg-web-primary">
        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="col-12 col-md-6 text-center">
                    <img src="{{ URL::asset('assets/img/kontak.png') }}" class="img-fluid w-75" alt="">
                </div>
                <div class="col-12 col-md-6 text-center text-md-start p-4">
                    <h4 class="text-warning">Gabung sekarang dan rasakan sendiri bagaimana SPINET dapat mengubah cara anda
                        belajar dan mengajar Fisika.</h4>
                    <p>Jangan ragu untuk menghubungi, kami dengan senang hati siap membantu!</p>
                    <button class="btn btn-primary">Kontak Kami</button>
                </div>
            </div>
        </div>
    </section>

    <section id="media" class="mb-4">
        <div class="container">
            <h4 class="text-warning mb-4 fw-bold">Media apa saja yang ada di Spinet?</h4>
            <div class="row justify-content-center">
                @foreach (['poster', 'materi', 'modul', 'video'] as $icon)
                    <div class="col-6 col-md-3 mb-4">
                        <div class="card-container">
                            <div class="card-flip card-shadow">
                                <div class="card-front bg-web-primary">
                                    <div
                                        class="card-body text-center py-4 d-flex align-items-center justify-content-center">
                                        <div class="text-center mb-3">
                                            <img src="{{ URL::asset('assets/icons/' . $icon . '.png') }}" style="width: 7em"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="card-body d-flex align-items-center justify-content-center text-center">
                                        <p class="fw-bold">Deskripsi untuk {{ $icon }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="terbaru" class="mb-4">
        <div class="container">
            <h4 class="text-warning mb-4 fw-bold">Media Terbaru</h4>
            <div class="row justify-content-center">
                @forelse ($media as $item)
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <a href="{{ route('detail', $item->id) }}" class="nav-link">
                            <div class="card card-shadow" style="height: 33em">
                                <div class="card-body text-center d-flex flex-column justify-content-center">
                                    <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold text-uppercase">
                                        {{ $item->extension }}
                                    </div>
                                    <div class="text-center mb-2">
                                        <img src="{{ URL::asset('storage/' . $item->thumbnails) }}" class="img-fluid"
                                            style="height: 20em; object-fit: cover" alt="">
                                    </div>
                                    <h5 class="text-start fw-bold">{{ $item->title }}</h5>
                                    <p class="text-start">{{ Str::limit($item->description, 50, '...') }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <h4 class="text-center fw-bold my-5">Tidak ada media</h4>
                @endforelse
            </div>
            <div class="text-center">
                <a href="#" class="btn btn-primary my-5">Temukan Lebih Banyak</a>
            </div>
        </div>
    </section>

    <section id="review" class="mb-4">
        <div class="container-fluid">
            <h4 class="text-warning mb-4 fw-bold">Umpan Balik Pelanggan Kami</h4>
            <div class="row justify-content-center">
                @foreach ($feedback as $feedback)
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div class="card card-shadow" style="height: 13em">
                            <div class="card-body text-center py-4 d-flex flex-column justify-content-start">
                                <img src="{{ URL::asset('storage/profile/default.png') }}" class="mb-2"
                                    style="width: 3em; height: 3em; object-fit: cover" alt="">
                                <h6 class="fw-bold text-start mb-4">{{ $feedback->name }}</h6>
                                <p class="text-start">{{ $feedback->message }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
