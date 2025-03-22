@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>{{ $breadcrumb->title }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('/kategori') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="kategori_kode" class="form-label">Kode Kategori</label>
                    <input type="text" name="kategori_kode" id="kategori_kode" class="form-control @error('kategori_kode') is-invalid @enderror" value="{{ old('kategori_kode') }}" required>
                    @error('kategori_kode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kategori_nama" class="form-label">Nama Kategori</label>
                    <input type="text" name="kategori_nama" id="kategori_nama" class="form-control @error('kategori_nama') is-invalid @enderror" value="{{ old('kategori_nama') }}" required>
                    @error('kategori_nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ url('/kategori') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
