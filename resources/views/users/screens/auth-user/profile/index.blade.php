@extends('users.layouts.layout-auth-user')

@push('style')
    <style>
        .text-center {
            position: relative;
        }

        .text-center:hover .hover-overlay {
            opacity: 1;
            visibility: visible;
        }

        .hover-overlay {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
    </style>
@endpush

@section('konten')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">Profile</h4>
    </div>

    <!-- List of Bookmarks -->
    <div class="row mb-4">
        {{-- @foreach ($bookmarks as $bookmark) --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-12">
            <div class="text-center position-relative ms-auto me-auto" style="width: 7em; height: 7em;">
                <!-- Profile Image -->
                <img src="{{ URL::asset('storage/' . $user->img_path) }}" class="rounded rounded-circle"
                    style="height: 100%; width: 100%; object-fit: cover;" alt="Profile Image">

                <!-- Hover Container (hidden by default) -->
                <div class="hover-overlay position-absolute top-0 start-0 w-100 h-100 rounded-circle d-flex justify-content-center align-items-center"
                    style="background-color: rgba(0, 0, 0, 0.5); color: white;">
                    Ganti Foto Profile
                </div>
            </div>

            <!-- Modal for Changing Profile Photo -->
            <div class="modal fade" id="changeProfileModal" tabindex="-1" aria-labelledby="changeProfileModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="changeProfileModalLabel">Change Profile Photo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for uploading a new profile photo -->
                            <form action="{{ route('user.profile.update-foto', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="oldImg" value="{{ $user->img_path }}">
                                <div class="mb-3">
                                    <label for="profilePhoto" class="form-label">Pilih Foto Profil Baru</label>
                                    <input class="form-control" type="file" id="profilePhoto" name="img_path"
                                        accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('user.profile.update', $user->id) }}" method="post" class="mb-2">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Masukkan Nama Lengkap"value="{{ $user->name }}" />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email"
                        disabled value="{{ $user->email }}" />
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username"
                        placeholder="Masukkan Username" value="{{ $user->username }}" />
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select class="form-select form-select" name="gender" id="gender">
                        <option {{ $user->gender == null ? 'selected' : '' }}>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki" {{ $user->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki - Laki</option>
                        <option value="Perempuan" {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" name="address" id="address" rows="3">{{ $user->address }}</textarea>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            <div class="text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#passwordModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                    </svg> Ubah Kata Sandi
                </button>

                <!-- Modal -->
                <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="passwordModalLabel">Ganti Password</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('user.profile.gantiPassword', $user->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="modal-body text-start">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password Baru</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="*****" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>
@endsection

@push('script')
    <script>
        document.querySelector('.text-center').addEventListener('click', function() {
            var myModal = new bootstrap.Modal(document.getElementById('changeProfileModal'));
            myModal.show();
        });
    </script>
@endpush
