<x-web-layout title="History">
    <style>
         h3 {
            margin-top: 20px;
            color: #007bff;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
    <div class="banner">
        <img src="{{ asset('assets/images/3.jpeg') }}" class="img-responsive bg" alt="banner-top" title="banner-top">
        <div class="container">
            <div class="matter">
                <div class="crumb">
                    <h2>History Pesanan dan Reservasi</h2>
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
            <div class="col-md-6">
                <h3>Pesanan</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode Pesanan</th>
                            <th>Total</th>
                            <th>Pemberitahuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->code }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{!! $order->pemberitahuan !!}</td>
                            <td><a href="{{ route('order.detail', $order->id) }}" class="btn btn-primary" style="color: black;">Lihat Detail Pesanan</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            

            <div class="col-md-6">
                <h3>Reservasi</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nomor Meja</th>
                            <th>Tanggal</th>
                            <th>Pemberitahuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->meja->id }}</td>
                            <td>{{ $booking->book_date }}</td>
                            <td>{!! $booking->pemberitahuan !!}</td>
                            <td><a href="{{ route('booking.show', $booking->id) }}" class="btn btn-primary" style="color: black;">Lihat Detail Reservasi</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    
</x-web-layout>
