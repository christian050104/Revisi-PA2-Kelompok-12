<x-web-layout title="Home">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
        .announcement {
            border: 1px solid #ddd;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            padding: 20px;
            margin: 20px 0;
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
            color: #fff;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .announcement:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .announcement h3 {
            color: #fff;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
            position: relative;
        }

        .announcement h3::before {
            content: '\f0a1';
            font-family: FontAwesome;
            font-size: 24px;
            margin-right: 10px;
            vertical-align: middle;
        }

        .announcement img {
            margin-top: 15px;
            border-radius: 10px;
            max-width: 100%;
            height: auto;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .announcement p {
            font-size: 18px;
            line-height: 1.6;
            color: #fff;
            margin-top: 15px;
        }

        .commontop {
            padding: 50px 0;
        }

        .commontop h4 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
        }

        .commontop h4::before {
            content: '';
            width: 60px;
            height: 3px;
            background: #fda085;
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
    <div class="slide">
        <div class="banner">
            <img src="{{ asset('assets/images/2.jpeg') }}" class="img-responsive bg" alt="banner-top" title="banner-top">
        </div>
        <div class="slide-detail col-lg-6 col-md-9 col-sm-8">
            <div class="col-sm-12">
                <h4>Friendzone Cafe</h4>
                <p>Selamat datang di Coffee Shop kami, tempat yang menyajikan secangkir kebahagiaan dalam setiap
                    tegukan.</p>
                <button type="button" class="btn btn-primary" onclick="location.href='{{ url('daftarmenu') }}';">Pesan
                    Sekarang</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 commontop text-center">
                <h4>Pengumuman Terbaru</h4>
                @foreach ($pengumumans as $item)
                <div class="announcement">
                    <h3>{{ $item->judul }}</h3>
                    @if ($item->image)
                        <img src="/images/{{ $item->image }}" alt="Gambar Pengumuman">
                    @endif
                    @if ($item->product)
                        @php
                            // Mengambil nilai diskon dari konten
                            $discountPercentage = intval($item->konten);
                            
                            // Memastikan nilai diskon berada dalam rentang 1-100
                            $discountPercentage = max(0, min(100, $discountPercentage));
                            
                            // Menghitung harga setelah diskon
                            $discountedPrice = $item->product->price * (1 - $discountPercentage / 100);
                        @endphp
                        <div class="product-info">
                            <p>
                                Harga: <span style="text-decoration: line-through;">Rp. {{ $item->product->price }}</span>
                                Diskon: {{ $discountPercentage }}% Off Harga Setelah Diskon: Rp. {{ $discountedPrice }}
                            </p>
                            <!-- Tambahkan tombol "View" -->
                            <a href="{{ url('/daftarmenu/menudetail', $item->product->id) }}" class="btn btn-primary">View</a>
                        </div>
                    @else
                        Tidak ada produk terkait
                    @endif
                    {{-- <p>
                        {{ $item->konten }}
                    </p> --}}
                </div>
            @endforeach
            
            
            

            </div>
        </div>
    </div>
</x-web-layout>
