<x-web-layout title="Ruangan">
    <style>
        .thumbnail {
            transition: transform 0.3s ease;
        }

        .thumbnail:hover {
            transform: scale(1.1);
            /* Memperbesar gambar sedikit saat hover */
        }

        .justify-content-end {
            justify-content: end;
            display: flex;
        }

        .reservation-button {
            margin-bottom: 10px;
        }

        .pagination-container {
            margin-top: 10px;
        }

        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            /* Efek zoom saat hover */
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
        }

        .card img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .commontop {
                text-align: center;
            }

            .order {
                margin: auto;
            }

            .breadcrumb {
                display: block;
            }

            .reservation-button {
                text-align: center;
            }
        }
    </style>
    <div class="bread-crumb" style="position: relative;">
        <img src="{{ asset('assets/images/5.jpeg') }}" class="img-responsive" alt="banner-top" title="banner-top"
            style="max-width: 100%; height: auto;">
        <div class="container" style="position: absolute; top: 60%; left: 50%; transform: translate(-50%, -50%);">
            <div class="matter" style="text-align: center; margin-top: 20px;">
                <h2>Pemesanan</h2>
                <ul class="list-inline">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/ruangan') }}">Pemesanan Meja</a></li>
                </ul>
            </div>
        </div>
    </div>



    <div class="reserved mar-b">
        <div class="container">
            <div class="row ">
                <div class="col-sm-12 commontop text-center">
                    <h4>Pemesanan Meja</h4>
                    <hr>
                    <p>Anda dapat dengan mudah memesan ruangan kami melalui pemesanan online atau melalui tim pelayanan
                        kami yang ramah. Kami menyediakan pilihan ruangan yang nyaman dan dilengkapi dengan fasilitas
                        modern, seperti meja rapat dan akses internet yang cepat. Setiap ruangan dirancang untuk
                        memberikan lingkungan yang kondusif bagi pertemuan atau acara Anda. Percayakan pada kami untuk
                        menjadikan acara Anda berjalan lancar dan sukses.</p>
                </div>
                <div class="col-sm-6 order col-sm-offset-3">
                    <form action="/ruangan/search" class="form-horizontal search-icon" method="GET">
                        <fieldset>
                            <div class="form-group">
                                <input name="search" value="{{ request('search') }}" placeholder="Kata Kunci"
                                    class="form-control" type="search">
                            </div>
                            <button type="submit" class="btn">Penelusuran</button>
                        </fieldset>
                    </form>
                    <br>
                    @if (isset($message))
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                    @endif
                </div>
                <div class="blog-area full-blog blog-standard full-blog grid-colum default-padding col-md-12">
                    <div class="reservation-button justify-content-end">
                        <button type="button" class="btn-primary"
                            onclick="location.href='{{ url('/booking/create') }}';">Pemesanan</button>
                    </div>
                    <div class="row card-column-fix">
                        @php $index = 0; @endphp
                        @foreach ($meja as $item)
                            @if ($index % 3 == 0)
                    </div>
                    <div class="row card-column-fix">
                        @endif
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('images/meja/' . $item->cover) }}" alt="image" title="image"
                                    class="img-responsive thumbnail" />
                                <div class="card-body">
                                    <h5 class="card-title"
                                        style="font-family: 'Roboto', sans-serif; font-size: 20px; font-weight: bold;">
                                        Nomor Meja: {{ $item->meja }}</h5>
                                    <p class="card-text" style="font-family: 'Open Sans', sans-serif; font-size: 16px;">
                                        {{ $item->description }}</p>
                                    <a href="#" class="btn btn-sm btn-info">{{ $item->status }}</a>
                                </div>
                            </div>
                        </div>
                        @php $index++; @endphp
                        @endforeach
                    </div>

                </div>
                <div class="pagination-container text-center">
                    {{ $meja->links('theme.web.custom') }}
                </div>
            </div>
        </div>
</x-web-layout>
