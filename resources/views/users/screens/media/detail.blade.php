@extends('users.layouts.layout')

@push('style')
    <style>
        /* Custom styles for active nav-link */
        .nav-tabs .nav-link.active {
            color: white !important;
            background-color: #0d6efd !important;
            border-color: #0d6efd !important;
        }

        .bg-comment {
            background-color: #EFF2FC !important;
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
            <div class="col-lg-3 col-md-3 col-sm-12">
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
            <div class="col-lg-9 col-md-9 col-sm-12">
                <h3 class="fw-bold">{{ $media->title }}
                </h3>
                <p class="fst-italic text-muted">Diunggah pada {{ $media->created_at->format('d F Y') }}</p>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-warning text-uppercase">{{ $media->extension }}</a>
                    <a href="#" class="btn btn-warning text-capitalize">{{ $media->type }}</a>
                    <a href="{{ route('user.media.download', $media->id) }}" class="btn btn-primary">Unduh</a>
                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#contentModal"
                        data-url="{{ URL::asset('storage/' . $media->document_path) }}" data-media-id="{{ $media->id }}"
                        data-user-id="{{ auth()->user()->id }}">Lihat Online</button>
                </div>
            </div>
            <div class="modal fade" id="contentModal" tabindex="-1" aria-labelledby="contentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contentModalLabel">Media Viewer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="modalContent">
                                <!-- Dynamic content will be loaded here -->
                            </div>
                        </div>
                    </div>
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
                <form action="{{ route('mediaComment.store', $media->id) }}" method="post" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
                @foreach ($media->komentar->where('media_id', $media->id)->where('parent_id', null) as $c)
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
                                    <form action="{{ route('media.like', $c->id) }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit" style="border: none; background: none; cursor: pointer;">
                                            @if ($c->likes()->where('user_id', auth()->id())->exists())
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-hand-thumbs-up-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
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
                        <form action="{{ route('mediaComment.reply', $c->id) }}" method="post">
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
                    @foreach ($media->komentar->where('parent_id', $c->id) as $reply)
                        <div class="card mb-3 border-0" style="margin-left: 10em">
                            <div class="card-body bg-comment rounded-3 mb-3">
                                <img src="{{ URL::asset('storage/' . $reply->user->img_path) }}"
                                    style="width: 3em; height: 3em; object-fit: cover" class="rounded-circle mb-2"
                                    alt="">
                                <h5 class="card-title">{{ $reply->user->name }}</h5>
                                <p class="text-muted">{{ $reply->created_at->format('d F Y') }}</p>
                                <p class="card-text">{{ $reply->comment }}</p>
                                <div class="d-flex gap-2 justify-content-end">
                                    <div class="like">
                                        <form action="{{ route('media.like', $reply->id) }}" method="post"
                                            style="display: inline;">
                                            @csrf
                                            <button type="submit"
                                                style="border: none; background: none; cursor: pointer;">
                                                @if ($reply->likes()->where('user_id', auth()->id())->exists())
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-hand-thumbs-up-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-hand-thumbs-up"
                                                        viewBox="0 0 16 16">
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
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#contentModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var url = button.data('url'); // Extract info from data-* attributes
                var mediaId = button.data('media-id'); // Get media ID from data attribute
                var userId = button.data('user-id'); // Get user ID from data attribute

                // Clear previous content
                $('#modalContent').empty();

                // Load content based on file type
                $.get(url, function(data) {
                    var extension = url.split('.').pop().toLowerCase();

                    if (['pdf', 'png', 'jpg', 'jpeg', 'mp4', 'mp3'].includes(extension)) {
                        if (extension === 'pdf') {
                            $('#modalContent').append('<embed src="' + url +
                                '" width="100%" height="500px" />');
                        } else if (['png', 'jpg', 'jpeg'].includes(extension)) {
                            $('#modalContent').append('<img src="' + url +
                                '" class="img-fluid" />');
                        } else if (extension === 'mp4') {
                            $('#modalContent').append('<video controls width="100%"><source src="' +
                                url +
                                '" type="video/mp4">Your browser does not support the video tag.</video>'
                            );
                        } else if (extension === 'mp3') {
                            $('#modalContent').append('<audio controls><source src="' + url +
                                '" type="audio/mp3">Your browser does not support the audio tag.</audio>'
                            );
                        }
                    } else {
                        $('#modalContent').append('<p>Unsupported file type.</p>');
                    }
                });

                // Send AJAX request to store bookmark
                $.ajax({
                    url: '/user/bookmark/store', // Route to handle the bookmark storage
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Add CSRF token for security
                        media_id: mediaId,
                        user_id: userId,
                    },
                    success: function(response) {
                        console.log(response.message); // Optionally display the success message
                    },
                    error: function(xhr) {
                        console.error('Error storing bookmark:', xhr);
                    }
                });
            });
        });
    </script>
@endpush
