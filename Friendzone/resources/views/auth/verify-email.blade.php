<x-web-layout title="Verify Email">
    <style>
        .bread-crumb .img-responsive {
            max-width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
    <div class="bread-crumb">
        <img src="{{ asset('assets/images/5.jpeg') }}" class="img-responsive" alt="banner-top" title="banner-top">
        <div class="container">
            <div class="matter">
                <h2>Verifikasi</h2>
                <ul class="list-inline">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/ruangan') }}">Verifikasi</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Verifikasi Email Anda</h2>
                <p>Terima kasih telah mendaftar! Sebelum memulai, Anda harus memverifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan melalui email. Jika Anda tidak menerima email tersebut, kami akan dengan senang hati mengirimkan yang baru kepada Anda.</p>

                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Kirim Ulang Email Verifikasi</button>
                </form>
            </div>
        </div>
    </div>
</x-web-layout>
