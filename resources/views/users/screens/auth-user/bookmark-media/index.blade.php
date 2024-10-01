@extends('users.layouts.layout-auth-user')

@section('konten')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">Media Terakhir Dikunjungi</h4>
    </div>

    <!-- List of Bookmarks -->
    <div class="row">
        @forelse ($bookmark as $item)
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <img src="{{ URL::asset('storage/' . $item->media->thumbnails) }}" class="img-fluid"
                                    style="height: 18em; object-fit: cover" alt="">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-6">
                                <a href="{{ route('detail', $item->media->id) }}" class="nav-link">
                                    <h3 class="fw-bold">{{ $item->media->title }}</h3>
                                </a>
                                <p class="fst-italic text-muted">Diunggah pada
                                    {{ $item->media->created_at->format('d F Y') }}</p>
                                <div class="d-flex gap-2">
                                    <a href="#"
                                        class="btn btn-warning text-uppercase text-white fw-bold">{{ $item->media->extension }}</a>
                                    <a href="#"
                                        class="btn btn-warning text-capitalize text-white fw-bold">{{ $item->media->type }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">
                <h5>Tidak ada data</h5>
            </div>
        @endforelse
    </div>
    <nav class="app-pagination my-5">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($bookmark->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $bookmark->previousPageUrl() }}" rel="prev">Sebelumnya</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($bookmark->links()->elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><a class="page-link">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $bookmark->currentPage())
                            <li class="page-item active" aria-current="page"><a class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($bookmark->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $bookmark->nextPageUrl() }}" rel="next">Berikutnya</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Berikutnya</a>
                </li>
            @endif
        </ul>
    </nav>
@endsection
