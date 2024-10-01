@extends('users.layouts.layout-auth-user')

@section('konten')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">Pesan Terkait</h4>
    </div>

    <!-- List of Bookmarks -->
    <div class="row">
        @foreach ($notifikasi as $item)
            <div class="col-12">
                <a href="{{ route('user.notifikasi-read', $item->id) }}" class="nav-link">
                    <div class="card py-4">
                        <div class="card-body">
                            <div class="d-flex gap-2 align-items-center">
                                @if ($item->is_opened == false)
                                    <div class="dots bg-primary rounded rounded-circle" style="height: 1em; width: 1em">
                                    </div>
                                @endif
                                <div class="content">
                                    <h5 class="{{ $item->is_opened == false ? 'fw-bold' : '' }} text-capitalize">
                                        {{ $item->title }}</h5>
                                    <h6 class="{{ $item->is_opened == false ? 'fw-bold' : '' }} mb-0">
                                        {{ $item->description }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <nav class="app-pagination my-5">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($notifikasi->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $notifikasi->previousPageUrl() }}" rel="prev">Sebelumnya</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($notifikasi->links()->elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><a class="page-link">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $notifikasi->currentPage())
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
            @if ($notifikasi->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $notifikasi->nextPageUrl() }}" rel="next">Berikutnya</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Berikutnya</a>
                </li>
            @endif
        </ul>
    </nav>
@endsection
