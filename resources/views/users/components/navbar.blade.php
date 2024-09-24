<style>
    .active-nav {
        font-weight: 700;
        color: #0d6efd;
    }
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ URL::asset('assets/img/logo.png') }}" alt="Bootstrap" width="100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ url()->current() == route('home') ? 'active-nav' : '' }}" aria-current="page"
                        href="{{ route('home') }}">Belajar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ url()->current() == route('modul') ? 'active-nav' : '' }}"
                        href="{{ route('modul') }}">Modul Ajar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ url()->current() == route('materi') ? 'active-nav' : '' }}"
                        href="{{ route('materi') }}">Materi Ajar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ url()->current() == route('media') ? 'active-nav' : '' }}"
                        href="{{ route('media') }}">Media</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ url()->current() == route('tentang') ? 'active-nav' : '' }}"
                        href="{{ route('tentang') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ url()->current() == route('kontak') ? 'active-nav' : '' }}"
                        href="{{ route('kontak') }}">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route('login') }}">Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
