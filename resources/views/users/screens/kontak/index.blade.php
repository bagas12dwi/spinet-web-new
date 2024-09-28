@extends('users.layouts.layout')

@push('style')
    <style>
        .bg-comment {
            background-color: #EFF2FC !important;
        }
    </style>
@endpush

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
                            <form action="{{ route('diskusiComment.store', $d->id) }}" method="post" class="mb-3">
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control" name="comment" id="komenter" rows="3"></textarea>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>

                            <!-- Display comments for this discussion -->
                            @foreach ($comment->where('discussion_id', $d->id)->where('parent_id', null) as $c)
                                <div class="card mb-3 border-0">
                                    <div class="card-body bg-comment rounded-3 mb-3">
                                        <img src="{{ URL::asset('storage/' . $c->user->img_path) }}"
                                            style="width: 3em; height: 3em; object-fit: cover" class="rounded-circle mb-2"
                                            alt="">
                                        <h5 class="card-title">{{ $c->user->name }}</h5>
                                        <p class="text-muted">{{ $c->created_at->format('d F Y') }}</p>
                                        <p class="card-text">{{ $c->comment }}</p>
                                        <div class="d-flex justify-content-end gap-2">
                                            <div class="like">
                                                <form action="{{ route('diskusi.like', $c->id) }}" method="post"
                                                    style="display: inline;">
                                                    @csrf
                                                    <button type="submit"
                                                        style="border: none; background: none; cursor: pointer;">
                                                        @if ($c->likes()->where('user_id', auth()->id())->exists())
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                                            </svg>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                                            </svg>
                                                        @endif
                                                        {{ $c->likes()->count() }}
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="comment">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
                                                </svg>
                                                {{ $c->replies->count() }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Form for replying to this comment -->
                                    <form action="{{ route('diskusiComment.reply', $c->id) }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <textarea class="form-control" name="reply-comment" id="reply-comment" rows="1"
                                                placeholder="Write a reply..."></textarea>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Display replies to this comment -->
                                @foreach ($comment->where('parent_id', $c->id) as $reply)
                                    <div class="card mb-3 border-0" style="margin-left: 10em">
                                        <div class="card-body bg-comment rounded-3 mb-3">
                                            <img src="{{ URL::asset('storage/' . $reply->user->img_path) }}"
                                                style="width: 3em; height: 3em; object-fit: cover"
                                                class="rounded-circle mb-2" alt="">
                                            <h5 class="card-title">{{ $reply->user->name }}</h5>
                                            <p class="text-muted">{{ $reply->created_at->format('d F Y') }}</p>
                                            <p class="card-text">{{ $reply->comment }}</p>
                                            <div class="d-flex gap-2 justify-content-end">
                                                <div class="like">
                                                    <form action="{{ route('diskusi.like', $reply->id) }}" method="post"
                                                        style="display: inline;">
                                                        @csrf
                                                        <button type="submit"
                                                            style="border: none; background: none; cursor: pointer;">
                                                            @if ($reply->likes()->where('user_id', auth()->id())->exists())
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                                                </svg>
                                                            @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                                                </svg>
                                                            @endif
                                                            {{ $reply->likes()->count() }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
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
