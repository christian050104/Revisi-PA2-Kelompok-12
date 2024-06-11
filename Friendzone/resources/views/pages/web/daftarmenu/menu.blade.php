<x-web-layout title="Menu">
    <style>
        body {
            background-color: rgb(208, 221, 224);
        }

        .card-img-top {
            height: 300px;
            object-fit: cover;
        }

        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            border-radius: 15px;
            overflow: hidden;
            text-align: center;
        }

        .card-body {
            flex: 1;
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card-title,
        .card-text {
            margin: 0 auto;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-footer {
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.5);
            border-top: 1px solid #ddd;
            text-align: center;
        }

        .card-footer .btn-primary {
            color: black;
            transition: background-color 0.3s ease;
            border: none;
            background-color: #007bff;
        }

        .card-footer .btn-primary:hover {
            background-color: #0056b3;
        }

        .search-filter-forms {
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 15px;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .search-filter-forms legend {
            color: #000;
            font-size: 16px;
            text-align: center;
            margin-bottom: 10px;
        }

        .search-filter-forms .form-group {
            margin-bottom: 15px;
        }

        .search-filter-forms .form-control {
            border-radius: 10px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 14px;
            color: #333;
        }

        .search-filter-forms .btn {
            width: 100%;
            background-color: #ff6b6b;
            border: none;
            border-radius: 10px;
            padding: 10px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .search-filter-forms .btn:hover {
            background-color: #e63946;
        }

        .input-group-append .btn-lg {
            padding: 0 15px;
        }

        .input-group .custom-select-lg {
            border-radius: 10px 0 0 10px;
        }

        .input-group-append .btn-success {
            border-radius: 0 10px 10px 0;
        }
    </style>

    <!-- Banner -->
    <div class="banner">
        <img src="{{ asset('assets/images/shop/3.jpeg') }}" class="img-responsive bg" alt="banner-top" title="banner-top">
        <div class="container">
            <div class="matter">
                <div class="crumb">
                    <h2>Daftar Menu</h2>
                    <ul class="list-inline">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="{{ url('/daftarmenu') }}">Daftar Menu</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Search and Filter Forms -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="search-filter-forms shadow-lg">
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <form action="/daftarmenu/search" class="form-horizontal" method="GET">
                                <fieldset>
                                    <legend class="text-center mb-3"><i class="icofont icofont-search mr-2"></i> Pencarian Kata Kunci</legend>
                                    <div class="input-group">
                                        <input name="search" value="" placeholder="Cari menu di sini..." class="form-control form-control-lg" type="search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-warning btn-lg">Cari Sekarang</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ url('/daftarmenu/filter') }}" class="form-horizontal" method="GET">
                                <fieldset>
                                    <legend class="text-center mb-3"><i class="icofont icofont-filter mr-2"></i> Pilih Kategori</legend>
                                    <div class="input-group">
                                        <select name="filter" class="custom-select custom-select-lg">
                                            <option value="">Semua</option>
                                            <option value="makanan">Makanan</option>
                                            <option value="minuman">Minuman</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-success btn-lg">Terapkan Filter</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Search and Filter Forms -->

    <!-- Product Cards -->
    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 m-5 col-12 mainpage">
                    <div class="row">
                        @if (isset($message))
                        <div class="alert alert-info">
                            {{ $message }}
                        </div>
                        @endif
                        @if (isset($filter))
                        <div class="alert alert-info">
                            Menampilkan menu {{ ucfirst($filter) }}
                        </div>
                        @endif
                        @foreach ($product as $index => $item)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/produk/' . $item->cover) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <h6 class="card-text">Stok: {{ $item->stock }}</h6>
                                    <h6 class="card-text">Harga: {{ $item->price }}</h6>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ url('/daftarmenu/menudetail', $item->id) }}" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-4">
                        {{ $product->links('theme.web.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Cards -->
</x-web-layout>
