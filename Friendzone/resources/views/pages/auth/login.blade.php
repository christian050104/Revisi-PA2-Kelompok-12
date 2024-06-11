<x-web-layout title="Login">
    <style>
        .bread-crumb .img-responsive {
            max-width: 100%;
            height: auto;
            object-fit: cover;
        }
        /* Tambahkan CSS untuk form */
        .login input[type="text"],
        .login input[type="password"] {
            background-color: #f5f5f5; /* Warna latar belakang form */
            color: #333; /* Warna font */
            border: 1px solid #ddd; /* Warna border */
            padding: 10px; /* Padding */
            margin-bottom: 10px; /* Margin bottom */
            width: 100%; /* Lebar form */
            box-sizing: border-box; /* Box sizing */
        }
        /* Tambahkan CSS untuk tombol login */
        .login button[type="submit"] {
            background-color: #007bff; /* Warna latar belakang tombol */
            color: #fff; /* Warna font tombol */
            border: none; /* Hapus border */
            padding: 10px 20px; /* Padding */
            font-size: 15px; /* Ukuran font */
            width: 100%; /* Lebar tombol */
            margin-top: 10px; /* Margin top */
            box-sizing: border-box; /* Box sizing */
        }
        /* Hover effect untuk tombol login */
        .login button[type="submit"]:hover {
            background-color: #0056b3; /* Warna latar belakang hover */
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <div class="bread-crumb">
        <img src="{{ asset('assets/images/6.jpeg') }}" class="img-responsive" alt="banner-top" title="banner-top">
        <div class="container">
            <div class="matter">
                <h2>Masuk</h2>
                <ul class="list-inline">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="#">Masuk</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-5 padd0">
                        <div class="leftside"></div>
                    </div>
                    <div class="col-sm-7 padd0">
                        <div class="loginnow" style="display: flex; justify-content: center;">
                            <form method="POST" action="{{ url('auth/login') }}" enctype="multipart/form-data"
                                style="width: 100%;">
                                @csrf
                                @error('email')
                                    <div class="alert alert-danger">
                                        Silahkan Isi Email Anda Terlebih Dahulu.
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <i class="icofont icofont-ui-message"></i>
                                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email"
                                        id="input-email" class="form-control" autocomplete="off" />
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">
                                        Silahkan Isi Password Anda Terlebih Dahulu.
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <i class="icofont icofont-lock"></i>
                                    <input type="password" name="password" value="" placeholder="Password"
                                        id="input-password" class="form-control" autocomplete="off" />
                                </div>
                                <div style="text-align: center;">
                                    <button type="submit" value="Login" class="btn btn-primary">LOGIN</button>
                                </div>
                                <p>Belum Memiliki Akun? Silahkan Membuat Akun Anda Dengan <a href="{{ url('/authreg') }}">Registrasi Sekarang</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>
