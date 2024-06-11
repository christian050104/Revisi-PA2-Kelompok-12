<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
            <thead>
                <tr>
                    <th style="width: 25%">No</th>
                    <th style="width: 50%">Gambar</th>
                    <th style="width: 25%">Aksi</th>
                </tr>
            </thead>
            <tbody class="list form-check-all">
                @foreach ($galleries as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset($item->image_path) }}" alt="{{ $item->title }}" class="img-fluid"
                                style="max-width: 100px;">
                        </td>
                        <td>
                            <ul class="list-inline hstack gap-2 mb-0">
                                <li class="btn btn-info-light btn-square br-50 m-1" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-placement="top" title="Show">
                                    <a href="{{ route('admin.gallery.show', $item->id) }}"
                                        class="text-primary d-inline-block edit-item-btn">
                                        <i class="ri-eye-fill fs-16"></i>
                                    </a>
                                </li>
                                <li class="btn btn-info-light" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-placement="top" title="Edit">
                                    <a href="{{ route('admin.gallery.edit', $item->id) }}"
                                        class="text-primary d-inline-block edit-item-btn">
                                        <i class="ri-pencil-fill fs-16"></i>
                                    </a>
                                </li>
                                <li class="btn btn-info-light" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-placement="top" title="Remove">
                                    <a href="javascript:;" onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{ route('admin.gallery.destroy', $item->id) }}');"
                                        class="text-danger d-inline-block remove-item-btn">
                                        <i class="ri-delete-bin-5-fill fs-16"></i>
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-center">
    {{ $galleries->links('theme.app.pagination') }}
</div>
