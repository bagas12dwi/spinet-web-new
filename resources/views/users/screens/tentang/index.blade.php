@extends('users.layouts.layout')

@section('konten')
    <section id="banner">
        <div class="container-fluid">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="container p-4">
                        <div class="title">
                            <h1 class="text-primary mb-5 fw-bold text-title" style="font-size: 2.5em;">Tentang Kami</h1>
                            <h5 class="text-primary text-title">
                                <span class="text-warning text-sub">SPINET (Smart Physics Interactive Educational
                                    Tools)</span>
                                merupakan media berbasis WEBSITE berisi menu-menu
                                <span class="text-warning text-sub">yang dapat membantu dalam belajar mengajar fisika
                                    dengan</span>
                                media dan kurikulum terkini dan interaktif.
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-end">
                    <img src="{{ URL::asset('assets/img/banner-modul.png') }}" alt="Banner" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section id="logo" class="py-4">
        <div class="container">
            <div class="row d-flex align-items-center logo-tentang card-shadow p-4 rounded-3">
                <div class="col-12 col-md-6 mb-3 mb-md-0">
                    <img src="{{ URL::asset('assets/img/logo-large.png') }}" alt="Logo" class="img-fluid">
                </div>
                <div class="col-12 col-md-6 makna-logo">
                    <div class="card bg-web-primary text-light mb-3">
                        <div class="card-body">
                            @php
                                $visi = $setting->where('title', 'Visi')->first();
                            @endphp
                            <h4 class="fw-bold">Visi</h4>
                            {{ $visi->description }}
                        </div>
                    </div>
                    <div class="card bg-web-primary text-light mb-3">
                        <div class="card-body">
                            @php
                                $misi = $setting->where('title', 'Misi')->first();
                            @endphp
                            <h4 class="fw-bold">Misi</h4>
                            {{ $misi->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($tim->count(0))
        <section id="tim" class="py-5">
            <div class="container">
                <h3 class="text-center">Tim Kami</h3>
                <p class="text-center">
                    "Tim kami di SPINET berdedikasi untuk menciptakan alat pembelajaran berbasis web yang
                    inovatif, guna mempermudah proses belajar mengajar fisika. Kami menggabungkan keahlian di bidang
                    pendidikan
                    dan teknologi untuk menghadirkan media interaktif yang sesuai dengan kurikulum, membuat fisika lebih
                    menarik
                    dan
                    mudah diakses oleh semua."
                </p>
                <div class="row d-flex justify-content-center">
                    @forelse ($tim as $item)
                        <div class="col-6 col-sm-4 col-md-3 mb-4">
                            <div class="card">
                                <img src="{{ URL::asset('storage/' . $item->img_path) }}" class="card-img-top img-fluid"
                                    style="height: 200px; width: 250px; object-fit: cover;" alt="Foto Tim">
                                <div class="card-body">
                                    <h5 class="fw-bold card-text">{{ $item->name }}</h5>
                                    <h6 class="fw-400 card-text">{{ $item->role }}</h6>
                                    <p class="card-text">{{ Str::limit($item->description, 80, '...') }}</p>
                                    <ul class="list-unstyled d-flex justify-content-center">
                                        @if ($item->twitter_name)
                                            <li>
                                                <a class="link-body-emphasis rounded-circle border border-muted border-2 d-flex justify-content-center align-items-center text-muted"
                                                    href="{{ $item->twitter_name }}" style="width: 40px; height: 40px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                                    </svg>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($item->facebook_name)
                                            <li>
                                                <a class="link-body-emphasis rounded-circle border border-muted border-2 d-flex justify-content-center align-items-center text-muted"
                                                    href="{{ $item->facebook_name }}" style="width: 40px; height: 40px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                                    </svg>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($item->ig_name)
                                            <li class="ms-3">
                                                <a class="link-body-emphasis rounded-circle border border-muted border-2 d-flex justify-content-center align-items-center text-muted"
                                                    href="https://www.instagram.com/{{ $item->ig_name }}" target="_blank"
                                                    style="width: 40px; height: 40px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.232c.035-.78.166-1.204.275-1.486a2.5 2.5 0 0 1 .598-.919c.28-.28.546-.453.919-.598.281-.11.704-.24 1.485-.275.843-.039 1.096-.046 3.233-.046zM8 3.25A4.75 4.75 0 1 0 8 12a4.75 4.75 0 0 0 0-8.75zm0 8a3.25 3.25 0 1 1 0-6.5 3.25 3.25 0 0 1 0 6.5zM12.094 3.906a1.106 1.106 0 1 0 0-2.212 1.106 1.106 0 0 0 0 2.212z" />
                                                    </svg>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Data tim tidak ditemukan.</p>
                    @endforelse
                </div>
            </div>
        </section>
    @endif

@endsection
