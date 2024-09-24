@extends('users.layouts.layout')


@section('konten')
    <section id="banner">
        <div class="container-fluid">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="container p-4">
                        <div class="title">
                            <h1 class="text-primary mb-5 fw-bold text-title" style="font-size: 5em">Kontak Kami</h1>
                            <h5 class="text-primary text-title"><span class="text-warning text-sub">Jika Anda memiliki
                                    pertanyaan atau memerlukan informasi</span>lebih lanjut tentang SPINET, jangan ragu
                                <span class="text-warning text-sub">untuk
                                    menghubungi kami.</span>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="text-end">
                        <img src="{{ URL::asset('assets/img/banner-modul.png') }}" alt="Banner">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="my-4">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-6 col-md-6 col-sm-12">
                    <h3 class="fw-bold">Kami disini untuk <span class="text-primary">membantu</span></h3>
                    <p class="fw-400 mb-4">Anda dapat mengisi formulir kontak dibawah ini, dan kami akan menghubungi anda
                        secepat
                        mungkin.</p>
                    <form action="" method="post" class="mb-3">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" id="name"
                                aria-describedby="helpName" placeholder="Nama Lengkap" />
                            <small id="helpName" class="form-text text-muted">Masukkan Nama Lengkap anda</small>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                aria-describedby="emailHelpId" placeholder="abc@mail.com" />
                            <small id="emailHelpId" class="form-text text-muted">Masukkan Email anda</small>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Pesan Anda</label>
                            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                        </div>
                        <button class="btn btn-primary w-100">Send</button>
                    </form>
                    <div class="kontak d-flex justify-content-between gap-3 mb-3">
                        @php
                            $no_telp = $setting->where('title', 'no telepon')->first();
                            $email = $setting->where('title', 'email')->first();
                            $alamat = $setting->where('title', 'alamat')->first();
                            $map = $setting->where('title', 'map')->first();
                        @endphp
                        <div class="d-flex align-items-center gap-2">
                            <div class="logo">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                </svg>
                            </div>
                            <div class="d-flex flex-column">
                                <h6>No. Telepon</h6>
                                <p class="mb-0">{{ $no_telp->description }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <div class="logo">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-envelope-open-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.314l6.709 3.932L8 8.928l1.291.718L16 5.714V5.4a2 2 0 0 0-1.059-1.765zM16 6.873l-5.693 3.337L16 13.372v-6.5Zm-.059 7.611L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516M0 13.373l5.693-3.163L0 6.873z" />
                                </svg>
                            </div>
                            <div class="d-flex flex-column">
                                <h6>Email</h6>
                                <p class="mb-0">{{ $email->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="logo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                            </svg>
                        </div>
                        <div class="d-flex flex-column">
                            <h6>Alamat</h6>
                            <p class="mb-0">{{ $alamat->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    {!! $map->description !!}
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="my-4">
        <div class="container">
            <h3 class="fw-bold text-warning text-center mb-3">
                Pertanyaan yang sering diajukan
            </h3>
            <div class="accordion" id="accordionExample">
                @foreach ($question as $index => $faqItem)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $index }}">
                            <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $index }}">
                                {{ $faqItem->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $index }}"
                            class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                            aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {{ $faqItem->answer }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="diskusi" class="my-5">
        <div class="container">
            <h3 class="fw-bold text-warning">Forum Diskusi</h3>
            <h6 class="fw-semibold mb-4">
                Anda dapat menemukan jawaban atas pertanyaan yang sering ditanyakan, berdiskusi dengan komunitas,
                serta mendapatkan solusi terkait penggunaan SPINET.
            </h6>

            <div class="container mb-5 card-shadow rounded-3">
                <!-- Nav Tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach ($diskusi as $index => $d)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                id="diskusi-tab-{{ $index }}" data-bs-toggle="tab"
                                data-bs-target="#diskusi-{{ $index }}" type="button" role="tab"
                                aria-controls="diskusi-{{ $index }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                {{ $d->title }}
                            </button>
                        </li>
                    @endforeach
                </ul>

                <!-- Tab Content -->
                <div class="tab-content p-5" id="myTabContent">
                    @foreach ($diskusi as $index => $d)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                            id="diskusi-{{ $index }}" role="tabpanel"
                            aria-labelledby="diskusi-tab-{{ $index }}">

                            <!-- Form for posting a new comment -->
                            {{-- <form action="{{ route('comment.store') }}" method="post" class="mb-3"> --}}
                            <form action="#" method="post" class="mb-3">
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control" name="komenter" id="komenter" rows="3"></textarea>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>

                            <!-- Display comments for this discussion -->
                            @foreach ($comment->where('discussion_id', $d->id) as $c)
                                <div class="card mb-3 border border-0">
                                    <div class="card-body bg-info bg-opacity-25 rounded-3 mb-3">
                                        <img src="{{ URL::asset('assets/img/profile.png') }}" class="rounded-circle mb-2"
                                            alt="">
                                        <h5 class="card-title">{{ $c->user->name }}</h5>
                                        <p class="text-muted">{{ $c->created_at->format('d F Y') }}</p>
                                        <p class="card-text">{{ $c->content }}</p>
                                    </div>

                                    <!-- Form for replying to this comment -->
                                    {{-- <form action="{{ route('comment.reply', $c->id) }}" method="post"> --}}
                                    <form action="#" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <textarea class="form-control" name="reply-comment" id="reply-comment" rows="1"></textarea>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Display replies to this comment -->
                                @foreach ($comment->where('parent_id', $c->id) as $reply)
                                    <div class="card mb-3 border border-0" style="margin-left: 10em">
                                        <div class="card-body bg-info bg-opacity-25 rounded-3 mb-3">
                                            <img src="{{ URL::asset('assets/img/profile.png') }}"
                                                class="rounded-circle mb-2" alt="">
                                            <h5 class="card-title">{{ $reply->user->name }}</h5>
                                            <p class="text-muted">{{ $reply->created_at->format('d F Y') }}</p>
                                            <p class="card-text">{{ $reply->content }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
