<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title">Detail Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @if (!$user)
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('/user') }}" class="btn btn-warning">Kembali</a>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr><th width="30%">ID</th><td>{{ $user->user_id }}</td></tr>
                    <tr><th>Level</th><td>{{ $user->level->level_nama }}</td></tr>
                    <tr><th>Username</th><td>{{ $user->username }}</td></tr>
                    <tr><th>Nama</th><td>{{ $user->nama }}</td></tr>
                    <tr><th>Password</th><td>********</td></tr>
                </table>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
    </div>
</div>
@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function () {
                $('#myModal').modal('show');
            });
        }
    </script>
@endpush

