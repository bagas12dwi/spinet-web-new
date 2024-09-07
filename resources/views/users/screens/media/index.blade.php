@extends('users.layouts.layout')

@section('konten')
    <section id="banner">
        <div class="d-flex justify-content-between align-items-center">
            <div class="container p-4 ">
                <h2 class="text-primary mb-5"><span class="text-warning">Selamat Datang Di</span> Menu Media kami! </h2>
                <h5 class="text-primary mb-3">
                    Di sini anda akan menemukan berbagai sumber daya multimedia yang dirancang untuk dapat memberikan
                    informasi yang mendalam dan pengalaman pembelajaran yang menarik. Jelajahi sub-menu berikut untuk
                    menemukan konten yang sesuai dengan kebutuhan Anda.
                </h5>
                <a href="#media" class="btn btn-primary">Temukan Lebih Banyak</a>
            </div>
            <img src="{{ URL::asset('assets/img/banner.png') }}" alt="Banner">
        </div>
        <div class="container-fluid bg-web-primary mb-3" style="height: 20vh"></div>
    </section>

    <section id="filter" class="mb-4">
        <div class="container">
            <div class="row d-flex mb-3">
                <div class="col-9">
                    <div class="d-flex gap-2 align-items-center">
                        <div class="mb-0">
                            <input type="emaitextl" class="form-control" id="exampleFormControlInput1"
                                placeholder="Judul Media" style="width: 20em">
                        </div>
                        <button class="btn btn-primary">Cari Media</button>
                        <p class="mb-0">Hasil Pencarian</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card p-0" style="width: 10em;">
                    <div class="card-header fw-bold bg-warning">
                        Pilih Media
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="" />
                            <label class="form-check-label" for=""> Modul </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="" />
                            <label class="form-check-label" for=""> Materi </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="" />
                            <label class="form-check-label" for=""> KIT </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="" />
                            <label class="form-check-label" for=""> Video </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="" />
                            <label class="form-check-label" for=""> Audio </label>
                        </div>
                    </div>
                </div>
                <div class="card p-0" style="width: 10em;">
                    <div class="card-header fw-bold bg-warning">
                        Bahan Ajar
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="" />
                            <label class="form-check-label" for=""> Modul </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="" />
                            <label class="form-check-label" for=""> Materi </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="media" class="my-3">
        <div class="container">
            <div class="d-flex flex-row justify-content-between">
                <div class="container">
                    <h4 class="text-warning mb-4 fw-bold">Media Terbaru</h4>
                </div>
                <div class="container">
                    <div class="d-flex align-items-center gap-2 justify-content-end">
                        <label for="" class="form-label m-0">Urutkan Media</label>
                        <select class="form-select form-select" name="" id="" style="width: 15em">
                            <option selected>Semua</option>
                            <option value="">Terbaru</option>
                            <option value="">Terlama</option>
                        </select>

                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-6">
                    <div class="card card-shadow" style="height: 33em">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="bg-warning py-1 px-3 align-self-end mb-2 fw-bold">PDF</div>
                            <div class="text-center mb-3">
                                <img src="{{ URL::asset('assets/img/media-terbaru.png') }}" class="img-fluid"
                                    style="height: 20em" alt="">
                            </div>
                            <p class="text-start">Kursus ini dirancang untuk memberikan dasar yang kuat dalam konsep-konsep
                                fundamental.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
