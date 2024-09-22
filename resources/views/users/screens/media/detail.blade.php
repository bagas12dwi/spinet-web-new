@extends('users.layouts.layout')

@push('style')
    <style>
        /* Custom styles for active nav-link */
        .nav-tabs .nav-link.active {
            color: white !important;
            background-color: #0d6efd !important;
            border-color: #0d6efd !important;
        }
    </style>
@endpush

@section('konten')
    <div class="container-fluid mb-3">
        <a class="nav-link py-4 d-flex gap-2 align-items-center" href="{{ route('media') }}">
            <div class="rounded-circle bg-primary d-flex justify-content-center align-items-center text-light"
                style="width: 40px; height: 40px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg>
            </div>
            <p class="m-0 fw-semibold">Kembali Ke Media </p>
        </a>
    </div>
    <div class="container mb-4">
        <div class="row">
            <div class="col-3 col-md-3 col-sm-12">
                <div class="card card-shadow">
                    <div class="card-body text-center d-flex flex-column">
                        <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                        <div class="text-center mb-3">
                            <img src="{{ URL::asset('storage/' . $media->thumbnails) }}" class="img-fluid"
                                style="height: 20em; object-fit: cover" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9 col-md-9 col-sm-12">
                <h3 class="fw-bold">{{ $media->title }}
                </h3>
                <p class="fst-italic text-muted">Diunggah pada 30/08/2024</p>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-warning text-uppercase">{{ $media->extension }}</a>
                    <a href="#" class="btn btn-warning">Materi</a>
                    <a href="#" class="btn btn-primary">Unduh</a>
                    <a href="#" class="btn btn-secondary">Lihat Online</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5 card-shadow rounded-3">
        <!-- Nav Tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="deskripsi-tab" data-bs-toggle="tab" data-bs-target="#deskripsi"
                    type="button" role="tab" aria-controls="deskripsi" aria-selected="true">Deskripsi</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="komentar-tab" data-bs-toggle="tab" data-bs-target="#komentar" type="button"
                    role="tab" aria-controls="komentar" aria-selected="false">Komentar</button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content p-5" id="myTabContent">
            <div class="tab-pane fade show active" id="deskripsi" role="tabpanel" aria-labelledby="deskripsi-tab">
                <p class="mt-3">{{ $media->description }}</p>
            </div>
            <div class="tab-pane fade" id="komentar" role="tabpanel" aria-labelledby="komentar-tab">
                <form action="" method="post" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <textarea class="form-control" name="komenter" id="komenter" rows="3"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
                <div class="card mb-3 border border-0 ">
                    <div class="card-body bg-info bg-opacity-25 rounded-3 mb-3">
                        <img src="{{ URL::asset('assets/img/profile.png') }}" class="rounded-circle mb-2" alt="">
                        <h5 class="card-title">John Doe</h5>
                        <p class="text-muted">10 Agustus 2024</p>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <textarea class="form-control" name="reply-comment" id="reply-comment" rows="1"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
                <div class="card mb-3 border border-0 " style="margin-left: 10em">
                    <div class="card-body bg-info bg-opacity-25 rounded-3 mb-3">
                        <img src="{{ URL::asset('assets/img/profile.png') }}" class="rounded-circle mb-2" alt="">
                        <h5 class="card-title">John Doe</h5>
                        <p class="text-muted">10 Agustus 2024</p>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
                <div class="card mb-3 border border-0 " style="margin-left: 10em">
                    <div class="card-body bg-info bg-opacity-25 rounded-3 mb-3">
                        <img src="{{ URL::asset('assets/img/profile.png') }}" class="rounded-circle mb-2" alt="">
                        <h5 class="card-title">John Doe</h5>
                        <p class="text-muted">10 Agustus 2024</p>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
                <div class="card mb-3 border border-0 " style="margin-left: 10em">
                    <div class="card-body bg-info bg-opacity-25 rounded-3 mb-3">
                        <img src="{{ URL::asset('assets/img/profile.png') }}" class="rounded-circle mb-2" alt="">
                        <h5 class="card-title">John Doe</h5>
                        <p class="text-muted">10 Agustus 2024</p>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
                <div class="card mb-3 border border-0 " style="margin-left: 10em">
                    <div class="card-body bg-info bg-opacity-25 rounded-3 mb-3">
                        <img src="{{ URL::asset('assets/img/profile.png') }}" class="rounded-circle mb-2" alt="">
                        <h5 class="card-title">John Doe</h5>
                        <p class="text-muted">10 Agustus 2024</p>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
                <div class="card mb-3 border border-0 " style="margin-left: 10em">
                    <div class="card-body bg-info bg-opacity-25 rounded-3 mb-3">
                        <img src="{{ URL::asset('assets/img/profile.png') }}" class="rounded-circle mb-2"
                            alt="">
                        <h5 class="card-title">John Doe</h5>
                        <p class="text-muted">10 Agustus 2024</p>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
                <div class="card mb-3 border border-0 " style="margin-left: 10em">
                    <div class="card-body bg-info bg-opacity-25 rounded-3 mb-3">
                        <img src="{{ URL::asset('assets/img/profile.png') }}" class="rounded-circle mb-2"
                            alt="">
                        <h5 class="card-title">John Doe</h5>
                        <p class="text-muted">10 Agustus 2024</p>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
