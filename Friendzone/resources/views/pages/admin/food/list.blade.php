<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Menu</th>
                                    <th scope="col" class="text-center">Kategori</th>
                                    <th scope="col" class="text-center">Harga</th>
                                    <th scope="col" class="text-center">Stok</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach ($product as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td class="text-end">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td class="text-center">{{ $item->stock }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('admin.food.show', $item->id) }}"
                                                    class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Lihat">
                                                    <i class="ri-eye-fill fs-16"></i>
                                                </a>
                                                <a href="{{ route('admin.food.edit', $item->id) }}"
                                                    class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit">
                                                    <i class="ri-pencil-fill fs-16"></i>
                                                </a>
                                                <a href="javascript:;"
                                                    onclick="handle_confirm('Apakah Anda Yakin?', 'Yakin', 'Tidak', 'DELETE', '{{ route('admin.food.destroy', $item->id) }}');"
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
            {{ $product->links('theme.app.pagination') }}
        </div>
    </div>
</div>
