<x-web-layout title="checkoutdetail">
    <style>
        .bread-crumb .img-responsive {
    max-width: 100%; /* Lebar maksimum gambar sesuai dengan lebar elemen induk */
    height: auto; /* Tinggi otomatis sesuai proporsi aslinya */
    object-fit: cover; /* Mengisi dan memotong gambar untuk menyesuaikan ukuran elemen */
}
    </style>
    <div class="bread-crumb">
		<img src="{{ asset('assets/images/5.jpeg') }}" class="img-responsive" alt="banner-top" title="banner-top">
		<div class="container">
			<div class="matter">
				<h2>Order</h2>
				<ul class="list-inline">
					<li><a href="{{ (url('/')) }}">Beranda</a></li>
					<li><a href="{{ url('/daftarmenu') }}">Order</a></li>
				</ul>
			</div>
		</div>
	</div>
    <div class="thanks">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 text-center">
                    <img src="{{ asset('assets/images/right_icon.png') }}" class="img-responsive" alt="icon" title="icon" />
                    <h2>Selamat, pesanan Anda dengan nomor pesanan {{ $order->code }} diterima.</h2>
                    <p>Terima kasih telah melakukan pemesanan dengan kami. Pembayaran Anda telah berhasil diproses. Silahkan cetak struk pembayaran Anda!</p>
                    <div class="ms-auto pageheader-btn">
                        <a href="{{ route('web.checkout.export.pdf', $order->id) }}" class="btn btn-primary">Cetak Struk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>