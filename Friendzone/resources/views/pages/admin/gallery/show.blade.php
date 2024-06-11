<x-app-layout title="Detail Galeri">
    <div class="app-content main-content mt-4">
        <div class="side-app">
            <div class="main-container container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Detail Galeri</h4>
                            </div>
                            <div class="card-body">
                                <h5>Judul: {{ $gallery->title }}</h5>
                                <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->title }}" class="img-fluid" style="max-width: 400px;">
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('admin.gallery.index') }}" class="btn btn-light">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
