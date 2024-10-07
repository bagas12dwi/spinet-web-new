@extends('users.layouts.layout')

@section('konten')
    <section id="banners">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($setting as $index => $set)
                    <div class="carousel-item  @if ($loop->first) active @endif">
                        <img src="{{ URL::asset('storage/' . $set->img_path) }}" class="d-block w-100" alt="Slide 1">
                        <div class="carousel-caption">
                            <h5>{{ $set->subtitle }}</h5>
                            <p>{{ $set->description ?? 'Some placeholder content' }}</p>
                            <a href="#terbaru" class="btn btn-primary">Temukan Lebih Banyak</a>
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
        {{-- <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
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
        </div> --}}
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
                            <div class="hover-text">Temukan modul dan materi pembelajaran interaktif yang menjadikan
                                belajar
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

    <section id="kontak" class="mb-4 bg-web-primary py-5">
        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="col-12 col-md-6 text-center">
                    <img src="{{ URL::asset('assets/img/kontak.png') }}" class="img-fluid w-75" alt="">
                </div>
                <div class="col-12 col-md-6 text-center text-md-start p-4">
                    <h4 class="text-warning">Gabung sekarang dan rasakan sendiri bagaimana SPINET dapat mengubah cara anda
                        belajar dan mengajar Fisika.</h4>
                    <p>Jangan ragu untuk menghubungi, kami dengan senang hati siap membantu!</p>
                    <button class="btn btn-primary mb-2">Kontak Kami</button>
                    <div class="card card-shadow bg-web-primary ms-0" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="text-white">Total Pengunjung</h5>
                            <div class="d-flex gap-2 align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                    class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                </svg>
                                <p class="display-4 text-white fw-bold mb-0" id="visitorCount">0</p>
                            </div>
                        </div>
                    </div>
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
                                        @switch($icon)
                                            @case('poster')
                                                <p class="fw-bold">Poster sebagai media untuk menyampaikan topik fisika pada proses
                                                    pembelajaran sehingga pembelajaran fisika lebih menarik.</p>
                                            @break

                                            @case('materi')
                                                <p class="fw-bold">KIT dirancang untuk memberikan semua yang diperlukan dalam satu
                                                    paket yang mudah diakses, dari panduan praktis hingga materi promosi.</p>
                                            @break

                                            @case('modul')
                                                <p class="fw-bold">Adanya alat peraga fisika dapat memperdalam pemahaman dengan
                                                    melalui pendekatan eksperimental yang mendukung proses belajar aktif.</p>
                                            @break

                                            @case('video')
                                                <p class="fw-bold">fitur yang memungkinkan berinteraksi langsung dengan metode
                                                    visual, video ini dirancang untuk memberikan pengalaman belajar.</p>
                                            @break

                                            @default
                                                <p class="fw-bold">Deskripsi untuk {{ $icon }}</p>
                                        @endswitch

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
        <div class="container">
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

@push('script')
    <script>
        // Fungsi untuk membuat animasi hitungan
        function animateCounter(start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const currentCount = Math.floor(progress * (end - start) + start);
                document.getElementById("visitorCount").textContent = currentCount;
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        // Angka akhir didapat dari jumlah pengunjung yang ada (diambil dari backend Laravel)
        document.addEventListener("DOMContentLoaded", function() {
            const visitorCount = {{ $pengunjung->count() }};
            animateCounter(0, visitorCount, 2000); // 2000ms = 2 detik
        });
    </script>
@endpush
