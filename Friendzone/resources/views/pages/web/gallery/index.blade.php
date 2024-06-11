<x-web-layout title="Galeri">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

        body {
            background-color: rgb(208, 221, 224);
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }

        .banner {
            margin-bottom: 30px;
            position: relative;
            text-align: center;
            color: white;
        }

        .banner img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .banner .matter {
            position: absolute;
            top: 60%; /* Menurunkan posisi matter */
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .banner h2 {
            font-size: 48px;
            font-weight: bold;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .banner .crumb ul {
            list-style: none;
            padding: 0;
            margin: 10px 0 0 0;
            display: inline-block;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px 20px;
            border-radius: 5px;
        }

        .banner .crumb ul li {
            display: inline;
            font-size: 20px;
            margin-right: 10px;
        }

        .banner .crumb ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .banner .crumb ul li a:hover {
            color: #ccc;
        }

        .shop {
            padding: 40px 0;
            width: 100%;
            overflow: hidden;
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(600px, 1fr)); /* Grid with two columns */
            gap: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .card {
            height: 500px; /* Tinggi lebih besar untuk kartu */
            margin: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            background-color: white;
            position: relative;
        }

        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card:hover img {
            transform: scale(1.05);
        }

        .card-body {
            text-align: center;
            padding: 20px;
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
        }

        .card-title {
            font-size: 28px;
            margin: 0;
            font-weight: 700;
            color: #333;
            position: relative;
        }

        .card-title::before {
            content: '';
            width: 60px;
            height: 3px;
            background: #fda085;
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        @media (max-width: 768px) {
            .card-grid {
                grid-template-columns: 1fr; /* Single column on small screens */
            }

            .card {
                height: 400px;
            }

            .banner h2 {
                font-size: 36px;
            }

            .banner .crumb ul li {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .card {
                height: 300px;
            }

            .banner h2 {
                font-size: 28px;
            }

            .banner .crumb ul li {
                font-size: 14px;
            }
        }
    </style>

    <div class="banner">
        <img src="{{ asset('assets/images/5.jpeg') }}" class="img-responsive bg" alt="banner-top" title="banner-top">
        <div class="container">
            <div class="matter">
                <div class="crumb">
                    <h2>Galeri</h2>
                    <ul class="list-inline">
                        <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                        <li><a href="{{ url('/galleries') }}"><i class="fas fa-images"></i> Galeri</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-12 mainpage">
                    <div class="card-grid">
                        @foreach ($galleries as $index => $gallery)
                            <div class="card">
                                <img src="{{ asset($gallery->image_path) }}" class="card-img-top" alt="{{ $gallery->title }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-4">
                        {{ $galleries->links('theme.web.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>
