@extends('layouts.app')

{{-- Customize layout section --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')

{{-- Content body main page content --}}
@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header"></div>
        <h3 class="card-title">Buat Kategori Baru</h3>
    </div>

    <form method="post" action="../kategori">
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="kodeKategori">Kode Kategori</label>
                <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" 
                       placeholder="Untuk Makanan, contoh : MKN">
            </div>

            <div class="form-group mb-3">
                <label for="namaKategori">Nama Kategori</label>
                <input type="text" class="form-control" id="namaKategori" name="namaKategori" 
                       placeholder="Masukkan Nama Kategori">
            </div>
        </div>

        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
