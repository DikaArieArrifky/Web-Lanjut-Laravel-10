<form action="{{ url('/penjualan/ajax') }}" method="POST" id="form-tambah-penjualan">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="modal-master" class="modal-dialog modal-lg" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                {{-- User --}}
                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->nama }}" readonly>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                </div>


                {{-- Pembeli --}}
                <div class="form-group">
                    <label>Nama Pembeli</label>
                    <input type="text" name="pembeli" id="pembeli" class="form-control" required>
                    <small id="error-pembeli" class="error-text form-text text-danger"></small>
                </div>

                {{-- Kode Penjualan --}}
                <div class="form-group">
                    <label>Kode Penjualan</label>
                    <input type="text" name="penjualan_kode" id="penjualan_kode" class="form-control" required>
                    <small id="error-penjualan_kode" class="error-text form-text text-danger"></small>
                </div>

                {{-- Tanggal Penjualan --}}
                <div class="form-group">
                    <label>Tanggal Penjualan</label>
                    <input type="date" name="penjualan_tanggal" id="penjualan_tanggal" class="form-control" required>
                    <small id="error-penjualan_tanggal" class="error-text form-text text-danger"></small>
                </div>

                {{-- Pilih Barang --}}
                <div class="form-group">
                    <label>Pilih Barang</label>
                    <select name="barang_id" id="barang_id" class="form-control" required>
                        <option value="">- Pilih Barang -</option>
                        @foreach ($barang as $item)
                        <option value="{{ $item->barang_id }}" data-harga="{{ $item->harga_jual }}">{{ $item->barang_nama }}</option>
                        @endforeach
                    </select>
                    <small id="error-barang_id" class="error-text form-text text-danger"></small>
                </div>

                {{-- Harga Per Barang --}}
                <div class="form-group">
                    <label>Harga Satuan</label>
                    <input type="number" class="form-control" name="harga_satuan" id="harga_satuan" readonly>
                </div>

                {{-- Jumlah Barang --}}
                <div class="form-group">
                    <label>Jumlah Barang</label>
                    <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control" min="1" required>
                    <small id="error-jumlah_barang" class="error-text form-text text-danger"></small>
                </div>

                {{-- Total Harga --}}
                <div class="form-group">
                    <label>Total Harga</label>
                    <input type="number" class="form-control" name="total_harga" id="total_harga" readonly>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>

</form>


<script>
    $(document).ready(function() {
        $("#form-tambah-penjualan").validate({
            rules: {
                user_id: {
                    required: true
                },
                pembeli: {
                    required: true,
                    minlength: 3
                },
                penjualan_kode: {
                    required: true,
                    minlength: 2
                },
                penjualan_tanggal: {
                    required: true
                },
                barang_id: {
                    required: true
                },
                jumlah_barang: {
                    required: true,
                    min: 1
                },
                total_harga: {
                    required: true
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function(response) {
                        if (response.status) {
                            $('#myModal').modal('hide');

                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            dataPenjualan.ajax.reload();
                        } else {
                            $('.error-text').text('');
                            $.each(response.msgField, function(prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    }
                });
                return false;
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
<script>
    $('#barang_id').on('change', function() {
        let harga = $('option:selected', this).data('harga') || 0;
        $('#harga_satuan').val(harga);
        updateTotal();
    });

    $('#jumlah_barang').on('input', function() {
        updateTotal();
    });

    function updateTotal() {
        let harga = parseInt($('#harga_satuan').val()) || 0;
        let jumlah = parseInt($('#jumlah_barang').val()) || 0;
        $('#total_harga').val(harga * jumlah);
    }
</script>