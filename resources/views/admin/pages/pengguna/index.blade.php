@extends('admin.layouts.default')

@push('style')
    <style>
        .table {
            table-layout: fixed;
            width: 100%;
        }

        .table th,
        .table td {
            word-wrap: break-word;
        }

        .table th:nth-child(1),
        .table td:nth-child(1) {
            width: 5%;
        }

        .table th:nth-child(2),
        .table td:nth-child(2) {
            width: 10%;
        }

        .table th:nth-child(3),
        .table td:nth-child(3) {
            width: 20%;
        }

        .table th:nth-child(4),
        .table td:nth-child(4) {
            width: 15%;
        }

        .table th:nth-child(5),
        .table td:nth-child(5) {
            width: 15%;
        }

        .table th:nth-child(6),
        .table td:nth-child(6) {
            width: 10%;
        }

        .table th:nth-child(7),
        .table td:nth-child(7) {
            width: 10%;
        }

        .table th:nth-child(8),
        .table td:nth-child(8) {
            width: 15%;
        }
    </style>
@endpush

@section('content')
    <div class="container-xl">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Manage {{ $title }}</h1>
            </div>
            <div class="col-auto">
                <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">
                            <a class="btn app-btn-primary" href="{{ route('admin.pengguna.create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    class="bi bi-plus-circle-fill me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                                </svg>Tambah {{ $title }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td><img src="{{ URL::asset('storage/' . $item->img_path) }}" class="rounded rounded-circle"
                                style="width: 3em; height: 3em; object-fit: cover" alt=""></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <form id="deleteForm" action="{{ route('admin.pengguna.destroy', $item->id) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" data-confirm-delete="true" id="delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3 text-white" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="8">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <nav class="app-pagination mt-5">
            <ul class="pagination justify-content-center">
                {{-- Previous Page Link --}}
                @if ($user->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $user->previousPageUrl() }}" rel="prev">Sebelumnya</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($user->links()->elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><a class="page-link">{{ $element }}</a>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $user->currentPage())
                                <li class="page-item active" aria-current="page"><a
                                        class="page-link">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($user->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $user->nextPageUrl() }}" rel="next">Berikutnya</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Berikutnya</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endsection
