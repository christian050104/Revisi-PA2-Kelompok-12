<x-app-layout title="Dashboard">
    <div id="content_list">
        <div class="app-content main-content mt-0">
            <div class="side-app">
                <div class="main-container container-fluid">
                    <div class="page-header">
                        <div>
                            <h1 class="page-title">Pengumuman</h1>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="mb-3">
                        <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-primary">Tambah Pengumuman</a>
                    </div>

                    <div class="container mt-5">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered text-nowrap border-bottom" id="basic-datatable">
                                                <thead class="bg-primary text-white">
                                                    <tr>
                                                        <th scope="col" class="text-center">No</th>
                                                        <th scope="col" class="text-center">Judul</th>
                                                        <th scope="col" class="text-center">Konten</th>
                                                        <th scope="col" class="text-center">Gambar</th>
                                                        <th scope="col" class="text-center">Product diskon</th>

                                                        <th scope="col" class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    @foreach($pengumuman as $item)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td>{{ $item->judul }}</td>
                                                            <td>{{ $item->konten }}</td>
                                                            <td class="text-center">
                                                                @if ($item->image)
                                                                    <img src="/images/{{ $item->image }}" alt="" width="100">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($item->product)
                                                                    {{ $item->product->title }}
                                                                @else
                                                                    Tidak ada produk terkait
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <a href="{{ route('admin.pengumuman.show', $item->id) }}"
                                                                        class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Lihat">
                                                                        <i class="ri-eye-fill fs-16"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.pengumuman.edit', $item->id) }}"
                                                                        class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Edit">
                                                                        <i class="ri-pencil-fill fs-16"></i>
                                                                    </a>
                                                                    <a href="javascript:;"
                                                                        onclick="handle_confirm('Apakah Anda Yakin?', 'Yakin', 'Tidak', 'DELETE', '{{ route('admin.pengumuman.destroy', $item->id) }}');"
                                                                        class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Hapus">
                                                                        <i class="ri-delete-bin-5-fill fs-16"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                {{ $pengumuman->links('theme.app.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-app-layout>

