<x-web-layout title="Detail Pesanan">
    <div class="banner">
        <img src="{{ asset('assets/images/shop/3.jpeg') }}" class="img-responsive bg" alt="banner-top" title="banner-top">
        <div class="container">
            <div class="matter">
                <div class="crumb">
                    <h2>Detail Pesanan</h2>
                    <ul class="list-inline">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="{{ url('/history') }}">History</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Detail Pesanan</h2>
                <p><strong>Kode Pesanan:</strong> {{ $order->code }}</p>
                <p><strong>Total:</strong> {{ $order->total }}</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga Satuan</th>
                            <!-- tambahkan kolom untuk informasi lain yang relevan tentang setiap produk -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderDetails as $orderDetail)
                        <tr>
                            <td>
                                <a href="{{ url('/daftarmenu/menudetail', $orderDetail->product->id) }}">
                                    <img src="{{ asset('images/produk/' . $orderDetail->product->cover) }}" alt="image" title="image" class="img-responsive mx-auto d-block" style="max-width: 100px;">
                                </a>
                            </td>
                            <td>{{ $orderDetail->product->title }}</td>
                            <td>{{ $orderDetail->quantity }}</td>
                            <td>{{ $orderDetail->product->price }}</td>
                            <!-- tambahkan kolom untuk informasi lain yang relevan tentang setiap produk -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Letakkan div thanks di bawah konten yang sudah ada -->
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
