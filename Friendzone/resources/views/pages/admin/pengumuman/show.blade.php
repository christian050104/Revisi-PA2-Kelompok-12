<x-app-layout title="Pengumuman Detail">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h2>{{ $pengumuman->judul }}</h2>
                        <p>{{ $pengumuman->konten }}</p>
                        @if ($pengumuman->image)
                            <img src="/images/{{ $pengumuman->image }}" alt="Pengumuman Image" class="img-fluid">
                        @endif

                        <!-- Add other details as needed -->
                        
                        <h3>Produk Diskon:</h3>
                        @if ($pengumuman->product)
                            <p>Nama Produk: {{ $pengumuman->product->title }}</p>
                            <p>Deskripsi: {{ $pengumuman->product->description }}</p>
                            <!-- Add other product details as needed -->
                        @else
                            <p>Tidak ada produk terkait.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
