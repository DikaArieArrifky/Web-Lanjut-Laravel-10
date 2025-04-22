@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('penjualan/create_ajax') }}')" class="btn btn-sm btn-primary mt-1">Tambah Penjualan</button>
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row mx-3 mt-2">
        <div class="col-md-12">
            <div class="form-group row">

            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Penjualan</th>
                    <th>Tanggal</th>
                    <th>Pembeli</th>
                    <th>User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true"></div>
@endsection

@push('js')
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }

    var dataPenjualan;

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        dataPenjualan = $('#table_penjualan').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('penjualan/list') }}",
                type: "POST",
                data: function(d) {
                    d.user_id = $('#user_id').val();
                }
            },
            columns: [
                { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
                { data: "penjualan_kode", className: "", orderable: true, searchable: true },
                { data: "penjualan_tanggal", className: "text-center", orderable: true, searchable: false },
                { data: "pembeli", className: "", orderable: true, searchable: true },
                { data: "user_id", className: "", orderable: false, searchable: false },
                { data: "aksi", className: "text", orderable: false, searchable: false }
            ]
        });

        $('#user_id').on('change', function() {
            dataPenjualan.ajax.reload();
        });
    });
</script>
@endpush
