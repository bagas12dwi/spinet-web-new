@extends('admin.layouts.default')

@section('content')
    <div class="container-xl">
        <a href="{{ route('admin.tim.index') }}" class="btn btn-primary text-white mb-3">
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
        <form action="{{ route('admin.tim.update', $tim->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpNama"
                    placeholder="Masukkan Nama Lengkap" value="{{ $tim->name }}" />
                <small id="helpNama" class="form-text text-muted">Masukkan Nama Lengkap</small>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Posisi</label>
                <input type="text" class="form-control" name="role" id="role" aria-describedby="helpPosisi"
                    placeholder="Masukkan Posisi" value="{{ $tim->role }}" />
                <small id="helpPosisi" class="form-text text-muted">Masukkan Posisi</small>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ $tim->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="ig_name" class="form-label">Nama Instagram</label>
                <input type="text" class="form-control" name="ig_name" id="ig_name" aria-describedby="helpIg"
                    placeholder="Masukkan Nama Instagram" value="{{ $tim->ig_name }}" />
                <small id="helpIg" class="form-text text-muted">Masukkan nama instagram tanpa '@'</small>
            </div>
            <div class="mb-3">
                <label for="facebook_name" class="form-label">Nama Facebook</label>
                <input type="text" class="form-control" name="facebook_name" id="facebook_name" aria-describedby="helpFb"
                    placeholder="Masukkan Nama Facebook" value="{{ $tim->facebook_name }}" />
                <small id="helpFb" class="form-text text-muted">Masukkan nama facebook</small>
            </div>
            <div class="mb-3">
                <label for="twitter_name" class="form-label">Nama Twitter</label>
                <input type="text" class="form-control" name="twitter_name" id="twitter_name"
                    aria-describedby="helpTwitter" placeholder="Masukkan Nama Twitter" value="{{ $tim->twitter_name }}" />
                <small id="helpTwitter" class="form-text text-muted">Masukkan nama twitter</small>
            </div>
            <img src="{{ URL::asset('storage/' . $tim->img_path) }}" alt="" style="width: 10em;">
            <div class="mb-3">
                <label for="img_path" class="form-label">Unggah Foto</label>
                <input type="file" class="form-control" name="img_path" id="img_path" placeholder="Unggah Foto"
                    aria-describedby="helpFoto" />
                <div id="helpFoto" class="form-text">Unggah Foto</div>
            </div>
            <input type="hidden" name="oldImg" value="{{ $tim->img_path }}">
            <button class="btn btn-primary text-white" type="submit">Simpan</button>
        </form>
    </div><!--//container-fluid-->
@endsection
