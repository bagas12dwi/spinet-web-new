@extends('admin.layouts.default')

@section('content')
    <div class="container-xl">
        <a href="{{ route('admin.setting.index') }}" class="btn btn-primary text-white mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-left me-1" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
            Kembali
        </a>
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Edit {{ $title }}</h1>
            </div>
        </div><!--//row-->

        <form action="{{ route('admin.setting.update', $setting->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="subtitle" class="form-label">Subtitle</label>
                <input type="text" class="form-control" name="subtitle" id="subtitle" aria-describedby="helpSubtitle"
                    placeholder="Masukkan Subtitle" value="{{ $setting->subtitle }}" />
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ $setting->description }}</textarea>
            </div>
            @if ($setting->img_path != null)
                <img src="{{ URL::asset('storage/' . $setting->img_path) }}" style="width: 10em; object-fit: cover"
                    alt="">
                <input type="hidden" name="oldImg" value="{{ $setting->img_path }}">
                <div class="mb-3">
                    <label for="img_path" class="form-label">Ganti Gambar</label>
                    <input type="file" class="form-control" name="img_path" id="img_path" placeholder="Upload Gambar"
                        aria-describedby="uploadGambar" />
                    <div id="uploadGambar" class="form-text">Tambahkan Gambar untuk banner</div>
                </div>
            @endif
            <button class="btn btn-primary text-white">Simpan</button>
        </form>
    </div><!--//container-fluid-->
@endsection
