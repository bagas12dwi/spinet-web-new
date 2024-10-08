@extends('users.layouts.layout')

@section('konten')
    <section id="banner">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="container p-4">
                <h2 class="text-primary mb-5">
                    <span class="text-warning">Selamat Datang Di</span> Menu Media kami!
                </h2>
                <h5 class="text-primary mb-3">
                    Di sini anda akan menemukan berbagai sumber daya multimedia yang dirancang untuk dapat memberikan
                    informasi yang mendalam dan pengalaman pembelajaran yang menarik. Jelajahi sub-menu berikut untuk
                    menemukan konten yang sesuai dengan kebutuhan Anda.
                </h5>
                <a href="#media" class="btn btn-primary">Temukan Lebih Banyak</a>
            </div>
            <img src="{{ URL::asset('assets/img/banner.png') }}" alt="Banner" class="img-fluid">
        </div>
        <div class="container-fluid bg-web-primary mb-3" style="height: 20vh;"></div>
    </section>

    <form method="GET" action="{{ route('media') }}">
        <section id="filter" class="mb-4">
            <div class="container">
                <div class="row d-flex mb-3">
                    <div class="col-12 col-md-9">
                        <div class="d-flex gap-2 align-items-center flex-wrap">
                            <input type="text" class="form-control mb-2" name="search" placeholder="Judul Media"
                                style="width: 100%;" value="{{ request('search') }}">
                            <button class="btn btn-primary">Cari Media</button>
                            <p class="mb-0">Hasil Pencarian</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 col-md-3 mb-3">
                        <div class="card p-0">
                            <div class="card-header fw-bold bg-warning">Pilih Media</div>
                            <div class="card-body">
                                @foreach (['PDF', 'Gambar', 'Video', 'Audio'] as $mediaType)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="mediaTypes[]"
                                            value="{{ strtolower($mediaType) }}" id="media-{{ $loop->index }}"
                                            {{ in_array(strtolower($mediaType), request('mediaTypes', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="media-{{ $loop->index }}">{{ $mediaType }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 mb-3">
                        <div class="card p-0">
                            <div class="card-header fw-bold bg-warning">Bahan Ajar</div>
                            <div class="card-body">
                                @foreach (['KIT', 'Modul', 'Materi'] as $bahanAjar)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="bahanAjar[]"
                                            value="{{ strtolower($bahanAjar) }}" id="bahan-{{ $loop->index }}"
                                            {{ in_array(strtolower($bahanAjar), request('bahanAjar', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="bahan-{{ $loop->index }}">{{ $bahanAjar }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 mb-3">
                        <div class="card p-0">
                            <div class="card-header fw-bold bg-warning">Urutkan Media</div>
                            <div class="card-body">
                                <select class="form-select" name="sort-media" id="sort-media" style="width: auto;"
                                    onchange="this.form.submit()">
                                    <option value="" selected>Semua</option>
                                    <option value="latest" {{ request('sort-media') == 'latest' ? 'selected' : '' }}>
                                        Terbaru</option>
                                    <option value="oldest" {{ request('sort-media') == 'oldest' ? 'selected' : '' }}>
                                        Terlama</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>




    <section id="media" class="my-3">
        <div class="container">
            <div class="d-flex flex-row justify-content-between align-items-center mb-3">
                <h4 class="text-warning fw-bold">Media Terbaru</h4>
            </div>
            <div class="row justify-content-center">
                @forelse ($media as $item)
                    <div class="col-12 col-sm-6 col-md-3 mb-4">
                        <a href="{{ route('detail', $item->id) }}" class="nav-link">
                            <div class="card card-shadow" style="height: 33em">
                                <div class="card-body text-center d-flex flex-column">
                                    <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold text-uppercase">
                                        {{ $item->extension }}
                                    </div>
                                    <div class="text-center mb-2">
                                        <img src="{{ URL::asset('storage/' . $item->thumbnails) }}" class="img-fluid"
                                            style="height: 300px; max-height: 300px; width: 250px; object-fit: cover"
                                            alt="">
                                    </div>
                                    <h5 class="text-start fw-bold text-truncate">{{ $item->title }}</h5>
                                    <p class="text-start fst-italic">{{ $item->created_at->format('d F Y') }}</p>
                                    <p class="text-start">{{ Str::limit($item->description, 50, '...') }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <h4 class="text-center fw-bold my-5">Tidak ada media</h4>
                @endforelse
            </div>
            <nav class="app-pagination mt-5">
                <ul class="pagination justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($media->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $media->previousPageUrl() }}" rel="prev">Sebelumnya</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($media->links()->elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true">
                                <a class="page-link">{{ $element }}</a>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $media->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link">{{ $page }}</a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($media->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $media->nextPageUrl() }}" rel="next">Berikutnya</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Berikutnya</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </section>
@endsection
