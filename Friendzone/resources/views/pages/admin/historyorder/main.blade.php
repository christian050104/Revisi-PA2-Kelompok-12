<x-app-layout title="HistoryOrder">
    <div id="content_list">
        <div class="app-content main-content mt-4">
            <div class="side-app">
                <div class="main-container container-fluid">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">History Produk</h3>
                                    <div class="ms-auto pageheader-btn">
                                        <a href="{{ route('admin.historyorder.export.pdf') }}"
                                            class="btn btn-primary">Ekspor PDF</a>
                                        <a class="btn btn-success export-btn"
                                            href="{{ route('admin.historyorder.export.excel') }}">
                                            <i class="ri-file-excel-line align-bottom me-1"></i>Export Excel</a>
                                    </div>
                                </div>
                                <div class="ms-auto pageheader-btn">
                                </div>
                                <div id="list_result"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content_input"></div>
    <div id="content_detail"></div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-app-layout>
