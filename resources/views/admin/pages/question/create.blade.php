@extends('admin.layouts.default')

@section('content')
    <div class="container-xl">
        <a href="{{ route('admin.faq.index') }}" class="btn btn-primary text-white mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-left me-1" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
            Kembali
        </a>
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Tambah {{ $title }}</h1>
            </div>
        </div><!--//row-->

        <form action="{{ route('admin.faq.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="question" class="form-label">Pertanyaan</label>
                <input type="text" class="form-control" name="question" id="question"
                    placeholder="Masukkan Pertanyaan" />
            </div>
            <div class="mb-3">
                <label for="answer" class="form-label">Jawaban</label>
                <textarea class="form-control" name="answer" id="answer" rows="3"></textarea>

            </div>
            <button class="btn btn-primary text-white">Simpan</button>
        </form>
    </div><!--//container-fluid-->
@endsection
