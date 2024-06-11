<x-app-layout title="{{ $gallery->id ? 'Edit Galeri' : 'Tambah Galeri Baru' }}">
    <div class="app-content main-content mt-4">
        <div class="side-app">
            <div class="main-container container-fluid">
                <div class="row row-sm justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ $gallery->id ? 'Edit Galeri' : 'Tambah Galeri Baru' }}</h4>
                            </div>
                            <div class="card-body">
                                <form id="form_input"
                                      action="{{ $gallery->id ? route('admin.gallery.update', $gallery->id) : route('admin.gallery.store') }}"
                                      method="POST"
                                      enctype="multipart/form-data"
                                      onsubmit="submitButton.disabled = true; return handleFormSubmit(event);">
                                    @csrf
                                    @if($gallery->id)
                                        @method('PATCH')
                                    @endif
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Judul</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $gallery->title) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Gambar</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*" {{ $gallery->id ? '' : 'required' }}>
                                        @if($gallery->image_path)
                                            <div class="mt-2">
                                                <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->title }}" width="100">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <a class="btn btn-light" href="{{ route('admin.gallery.index') }}">Kembali</a>
                                            <button type="submit" class="btn btn-primary" name="submitButton">
                                                {{ $gallery->id ? 'Edit Galeri' : 'Tambah Galeri' }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
   function handleFormSubmit(event) {
    event.preventDefault(); // Mencegah pengiriman form bawaan HTML

    const form = event.target;

    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Pastikan data yang dimasukkan sudah benar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, simpan!',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            // Mengirimkan data form secara asynchronous menggunakan Fetch API
            fetch(form.action, {
                method: form.method,
                body: new FormData(form),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire(
                        'Berhasil!',
                        data.message,
                        'success'
                    ).then(() => {
                        window.location.href = data.redirect;
                    });
                } else {
                    Swal.fire(
                        'Gagal!',
                        data.message,
                        'error'
                    ).then(() => {
                        // Enable submit button again for editing
                        form.querySelector('[name="submitButton"]').disabled = false;
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire(
                    'Gagal!',
                    'Terjadi kesalahan saat menyimpan data.',
                    'error'
                ).then(() => {
                    // Enable submit button again for editing
                    form.querySelector('[name="submitButton"]').disabled = false;
                });
            });
        } else {
            // Enable submit button again for editing
            form.querySelector('[name="submitButton"]').disabled = false;
        }
    });
}

</script>
