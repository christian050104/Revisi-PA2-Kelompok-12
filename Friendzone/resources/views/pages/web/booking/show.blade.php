<x-web-layout title="Detail Reservasi">
    <div class="banner">
        <img src="{{ asset('assets/images/5.jpeg') }}" class="img-responsive bg" alt="banner-top" title="banner-top">
        <div class="container">
            <div class="matter">
                <div class="crumb">
                    <h2>Detail Reservasi</h2>
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
                <div class="reservation-details">
                    <h2>Detail Reservasi</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Meja</th>
                                    <td>{{ $booking->meja->meja }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $booking->meja->description }}</td>
                                </tr>
                                <tr>
                                    <th>Status Meja</th>
                                    <td>{{ $booking->meja->status }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{ $booking->book_date }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p><strong>Gambar:</strong></p>
                        <img src="{{ asset('images/meja/'.$booking->meja->cover) }}" alt="image" title="image" class="img-responsive meja-image" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>
