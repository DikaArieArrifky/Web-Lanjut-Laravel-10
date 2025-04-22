<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-left">
            @if (!$user)
            <div class="alert alert-danger">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                Data yang Anda cari tidak ditemukan.
            </div>
            <a href="{{ url('/user') }}" class="btn btn-warning">Kembali</a>
            @else
            {{-- Foto Profil Bulat --}}
            @if ($user->foto)
            <img src="{{ asset('uploads/profile/' . $user->foto) }}"
                alt="Foto Profil"
                class="rounded-circle mb-3"
                width="150" height="150"
                style="object-fit: cover">
            @else
            <div class="text-muted mb-3">Tidak ada foto</div>
            @endif


            {{-- Tabel Info User --}}
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 30%">ID</th>
                        <td>{{ $user->user_id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%">Level</th>
                        <td>{{ $user->level->level_nama }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%">Username</th>
                        <td>{{ $user->username }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%">Nama</th>
                        <td>{{ $user->nama }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%">Password</th>
                        <td>********</td>
                    </tr>
                </table>
            </div>


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
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }
</script>
@endpush