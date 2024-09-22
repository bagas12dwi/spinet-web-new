@extends('admin.layouts.default')

@section('content')
    <div class="container-xl">
        <a href="{{ route('admin.media.index') }}" class="btn btn-primary text-white mb-3">
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

        <form action="{{ route('admin.media.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nama Media</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpTitle"
                    placeholder="Masukkan Nama Media" />
                <small id="helpTitle" class="form-text text-muted">Masukkan nama media</small>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="thumbnails" class="form-label">Thumbnails</label>
                <input type="file" class="form-control" name="thumbnails" id="thumbnails" placeholder="Upload Thumbnails"
                    aria-describedby="thumbnailsHelp" />
                <div id="thumbnailsHelp" class="form-text">Upload Thumbnails</div>
            </div>
            <div class="mb-3">
                <label for="document_path" class="form-label">Media</label>
                <input type="file" class="form-control" name="document_path" id="document_path"
                    placeholder="Upload media" aria-describedby="mediaHelp" />
                <div id="mediaHelp" class="form-text">Unggah Media dengan ekstensi .pdf, .mp4, .png, .jpg, .jpeg, .mp3</div>
            </div>
            <button class="btn btn-primary text-white">Simpan</button>
        </form>
    </div><!--//container-fluid-->
@endsection
