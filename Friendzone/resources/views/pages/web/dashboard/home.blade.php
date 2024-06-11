<x-web-layout title="Home">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
        .btn-primary {
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .commontop,
        .box,
        .slide-detail {
            animation: fadeInUp 1s ease-in-out;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(270deg, #c9d6ff, #e2e2e2, #c9d6ff, #e2e2e2);
            background-size: 600% 600%;
            animation: gradientAnimation 15s ease infinite;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Menentukan tinggi tetap untuk gambar */
        .card-img-top {
            height: 300px;
            /* Atur tinggi gambar sesuai kebutuhan */
            object-fit: cover;
            /* Untuk memastikan gambar tetap proporsional */
        }

        /* Menentukan tinggi tetap untuk kartu */
        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: 100%;
            /* Memastikan setiap kartu memiliki tinggi yang sama */
            display: flex;
            flex-direction: column;
            border-radius: 15px;
            /* Membuat sudut kartu menjadi bulat */
            overflow: hidden;
            /* Mengatasi sudut bulat yang terlalu besar */
        }

        /* Menyamakan tinggi konten di dalam kartu */
        .card-body {
            flex: 1;
            /* Agar konten di dalam kartu menyesuaikan tinggi kartu */
            padding: 15px;
        }

        /* Efek zoom saat hover */
        .card:hover {
            transform: scale(1.05);
        }

        /* Styling untuk tombol View */
        .card-footer {
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.5);
            border-top: 1px solid #ddd;
            text-align: center;
            /* Pusatkan tombol View */
        }

        /* Aligment tombol View */
        .card-footer .btn-primary {
            color: black;
            transition: background-color 0.3s ease;
            /* Efek hover */
            border: none;
            background-color: #007bff;
            /* Warna default tombol */
        }

        /* Efek hover pada tombol View */
        .card-footer .btn-primary:hover {
            background-color: #0056b3;
            /* Warna saat dihover */
        }

        .team .container {
            text-align: center;
        }

        .map iframe {
            border: 4px solid #f1f1f1;
            /* Pertebalan border */
            border-radius: 10px;
            /* Membuat sudut border menjadi melengkung */
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            /* Efek bayangan untuk memberikan dimensi dan kedalaman */
        }
    </style>
    <div class="slide">
        <div class="banner">
            <img id="banner-image" src="{{ asset('assets/images/shop/5.jpeg') }}" class="img-responsive bg"
                alt="banner-top" title="banner-top">
        </div>
        <div class="slide-detail col-lg-6 col-md-9 col-sm-8 animate__animated animate__fadeInUp">
            <div class="col-sm-12">
                <h4>Friendzone</h4>
                <p>Selamat datang di Coffee Shop kami, tempat yang menyajikan secangkir kebahagiaan dalam setiap
                    tegukan.</p>
                <button type="button" class="btn-primary" onclick="location.href='{{ url('daftarmenu') }}';">Pesan
                    Sekarang</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 commontop text-center animate__animated animate__fadeInUp">
                <h4>Friendzone</h4>
                <hr>
                <p>Kami berkomitmen untuk memberikan Anda pengalaman kopi terbaik. Bagi kami, kopi adalah seni yang kami
                    cintai dan hidupkan setiap hari. Kami hanya menggunakan biji kopi pilihan yang dipanggang dengan
                    keahlian tinggi untuk menghasilkan cita rasa yang kaya dan menggoda selera. Mari bergabung dengan
                    kami dalam perjalanan menikmati kopi sejati yang tak terlupakan.</p>
            </div>
        </div>
    </div>





    <div class="service">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 commontop text-center animate__animated animate__fadeInUp">
                    <h4>Layanan Kami</h4>
                    <hr>
                    <p>Rasakan kesempurnaan kopi dalam suasana yang nyaman dan santai di Coffee Shop kami. Kami berjanji
                        setiap kunjungan Anda akan menjadi pengalaman yang memuaskan dan membangkitkan selera. Ayo
                        kunjungi kami dan nikmati kopi terbaik dalam atmosfer yang mengundang.</p>
                </div>
            </div>

            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="box text-center">
                            <img src="{{ asset('assets/images/about/icon1.png') }}" class="img-responsive"
                                alt="icon" title="icon" />
                            <h4>Koki Terbaik</h4>
                            <p>Di Coffee Shop kami, Anda akan dilayani oleh tim pelayan yang ramah dan berpengalaman.
                                Kami berkomitmen untuk menjaga standar kualitas tinggi dalam setiap cangkir yang kami
                                sajikan. Percayalah, kami memegang teguh keyakinan bahwa kualitas adalah kunci untuk
                                menciptakan pengalaman kopi yang memuaskan dan tak terlupakan.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box text-center">
                            <img src="{{ asset('assets/images/about/icon2.png') }}" class="img-responsive"
                                alt="icon" title="icon" />
                            <h4>Meja</h4>
                            <p>Di Coffee Shop kami, setiap meja menjadi panggung di mana cerita-cerita terbentuk dan
                                hubungan terjalin. Kami berkomitmen menyediakan ruang yang memungkinkan Anda untuk
                                menghirup udara segar dalam keriuhan kehidupan sehari-hari, sambil menikmati secangkir
                                kopi yang sempurna. Datanglah dan buatlah momen-momen istimewa di antara teman-teman,
                                keluarga, atau hanya untuk merenung dalam ketenangan sendiri.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box text-center">
                            <img src="{{ asset('assets/images/about/icon3.png') }}" class="img-responsive"
                                alt="icon" title="icon" />
                            <h4>Penjualan Terbaik</h4>
                            <p>Di Coffee Shop kami, tidak hanya tentang kopi. Kami juga menawarkan beragam pilihan menu
                                terbaik yang akan memanjakan lidah Anda. Dari Blue lagoon americano, Coffe late avocado,
                                Wild rosa americano,
                                hingga hidangan lezat seperti Bihun goreng seafood dan Nasi Goreng yang menggugah
                                selera, serta
                                hidangan penutup manis yang memanjakan nafsu Anda. Setiap hidangan kami disiapkan dengan
                                penuh cinta dan menggunakan bahan-bahan berkualitas tinggi untuk memberikan kenikmatan
                                yang tak terlupakan. Rasakan kelezatan dan kepuasan di setiap suapan dan tegukan di
                                Coffee Shop kami.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box text-center">
                            <img src="{{ asset('assets/images/about/icon5.png') }}" class="img-responsive"
                                alt="icon" title="icon" />
                            <h4>Pembayaran Dengan Kartu</h4>
                            <p>Kami sangat menghargai kenyamanan dan kepuasan pelanggan kami, dan itu termasuk
                                memastikan proses pembayaran yang lancar. Dengan layanan pembayaran kartu yang kami
                                sediakan, Anda dapat sepenuhnya fokus pada menikmati hidangan dan minuman berkualitas
                                tinggi kami, tanpa harus khawatir tentang proses transaksi. Jadikan kunjungan Anda lebih
                                menyenangkan dengan kemudahan pembayaran di Coffee Shop kami.</p>
                        </div>
                    </div>
                </div>

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-xs-12 commontop text-center animate__animated animate__fadeInUp">
        <h4>Daftar Menu</h4>
    </div>
    <br><br><br>
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
                                    <img src="{{ asset('images/produk/' . $item->cover) }}" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                        <h6 class="card-text">Stok: {{ $item->stock }}</h6>
                                        <h6 class="card-text">Harga: {{ $item->price }}</h6>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ url('/daftarmenu/menudetail', $item->id) }}"
                                            class="btn btn-primary">View</a>
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

    <br><br>
    <div class="reserved mar-b">
        <div class="container">
            <div class="row ">
                <div class="col-sm-12 commontop text-center">
                    <h4>Pemesanan Meja</h4>
                    <hr>
                    <p>Anda dapat memesan ruangan kami dengan mudah melalui pemesanan online atau melalui tim pelayanan
                        kami yang ramah.
                        Kami menyediakan pilihan ruangan yang nyaman dan dilengkapi dengan fasilitas modern, seperti
                        meja rapat, layar proyektor,
                        dan akses internet yang cepat. Setiap ruangan dirancang untuk memberikan lingkungan yang
                        kondusif bagi pertemuan atau acara Anda.</p>
                </div>
                {{-- <div class="col-sm-6 order col-sm-offset-3">
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
                </div> --}}
                <div class="blog-area full-blog blog-standard full-blog grid-colum default-padding col-md-12">
                    {{-- <div class="reservation-button justify-content-end">
                        <button type="button" class="btn-primary"
                            onclick="location.href='{{ url('/booking/create') }}';">Pemesanan</button>
                    </div> --}}
                    <div class="row card-column-fix">
                        @foreach ($meja as $item)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('images/meja/' . $item->cover) }}" alt="image" title="image"
                                        class="img-responsive thumbnail" />
                                    <div class="card-body">
                                        <h5 class="card-title"
                                            style="font-family: 'Roboto', sans-serif; font-size: 20px; font-weight: bold;">
                                            Nomor Meja: {{ $item->meja }}</h5>
                                        <p class="card-text"
                                            style="font-family: 'Open Sans', sans-serif; font-size: 16px;">
                                            {{ $item->description }}</p>
                                        <a href="#" class="btn btn-sm btn-info">{{ $item->status }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="pagination-container text-center">
                {{ $meja->links('theme.web.custom') }}
            </div>
        </div>
    </div>

    <div class="team">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-xs-12 commontop text-center animate__animated animate__fadeInUp">
                    <h4>Pemilik</h4>
                    <hr>
                </div>
                <div class="col-sm-6 col-xs-6">
                    <div class="box animate__animated animate__fadeInUp" style="max-width: 350px; margin: 0 auto;">
                        <img src="{{ asset('assets/images/about/suami.jpeg') }}" class="img-responsive"
                            alt="icon" title="icon" style="max-width: 100%; height: auto;">
                        <div class="caption text-center">
                            <h4>Natal Tri Putra Marpaung </h4>
                            <ul class="list-inline social">
                                <li><a href="https://www.facebook.com/" target="_blank"><i
                                            class="icofont icofont-social-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/" target="_blank"><i
                                            class="icofont icofont-social-instagram"></i></a></li>
                                <li><a href="https://wa.me/6282277592764" target="_blank"><i
                                            class="icofont icofont-social-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                    <div class="box animate__animated animate__fadeInUp" style="max-width: 350px; margin: 0 auto;">
                        <img src="{{ asset('assets/images/about/istri.jpeg') }}" class="img-responsive"
                            alt="icon" title="icon" style="max-width: 100%; height: auto;">
                        <div class="caption text-center">
                            <h4>Rosairoh Magdalena Simanjuntak</h4>
                            <ul class="list-inline social">
                                <li><a href="https://www.facebook.com/" target="_blank"><i
                                            class="icofont icofont-social-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/" target="_blank"><i
                                            class="icofont icofont-social-instagram"></i></a></li>
                                <li><a href="https://wa.me/6282277592764" target="_blank"><i
                                            class="icofont icofont-social-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contactus">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 commontop text-center">
                    <h4>Hubungi Kami</h4>
                    <hr>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7962.3320408684395!2d99.1776305!3d2.4208568!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb42d897c66e5204b!2sWarunk%20Friendzone!5e0!3m2!1sen!2sid!4v1677636410802!5m2!1sen!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 commontop text-center">
                    <h4>Kritik & Saran</h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="{{ route('kritiksaran.store') }}"
                    class="form-horizontal col-sm-12" onsubmit="return checkLoginStatus() && validateForm()">
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-12">
                            <i class="icofont icofont-pencil-alt-5"></i>
                            <textarea id="input-enquiry" class="form-control" name="kritiksaran" placeholder="Kritik & Saran Friendzone Cafe">{{ old('kritiksaran') }}</textarea>
                            @error('kritiksaran')
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="buttons text-left">
                        <input class="btn btn-primary" type="submit" value="Kirim Pesan" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        function checkLoginStatus() {
            if (!isLoggedIn()) {
                toastr.error('Anda harus login untuk memberikan kritik dan saran.');
                return false;
            }
            return true;
        }

        function isLoggedIn() {
            return {{ Auth::check() ? 'true' : 'false' }};
        }

        function validateForm() {
            var message = document.getElementById("input-enquiry").value;
            if (message.trim() === "") {
                toastr.error("Please enter a message.");
                return false;
            }
            return true;
        }
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-115890069-7');
    </script>
    <script>
        // Daftar gambar yang akan ditampilkan di banner
        var images = [
            "{{ asset('assets/images/shop/3.jpeg') }}",
            "{{ asset('assets/images/shop/2.jpeg') }}",
            "{{ asset('assets/images/shop/5.jpeg') }}",
            // Tambahkan gambar lain jika diperlukan
        ];

        var currentIndex = 0;
        var bannerImage = document.getElementById('banner-image');

        // Fungsi untuk menampilkan gambar selanjutnya di banner dengan efek fading
        function showNextImage() {
            var nextIndex = (currentIndex + 1) % images.length;
            var nextImage = new Image();
            nextImage.src = images[nextIndex];
            nextImage.onload = function() {
                bannerImage.style.opacity = 0;
                bannerImage.src = nextImage.src;
                fadeIn(bannerImage);
                currentIndex = nextIndex;
            };
        }

        // Fungsi untuk memberikan efek fading saat gambar berubah
        function fadeIn(element) {
            var opacity = 0;
            var interval = setInterval(function() {
                if (opacity < 1) {
                    opacity += 0.05;
                    element.style.opacity = opacity;
                } else {
                    clearInterval(interval);
                }
            }, 50);
        }

        // Ganti gambar setiap lima detik
        setInterval(showNextImage, 3500);
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const swiper = new Swiper('.swiper-container', {
                loop: true,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 5000,
                },
            });
        });
    </script>
</x-web-layout>
