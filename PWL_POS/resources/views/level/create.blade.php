@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Level
                    <a href="{{ route('level.index') }}" class="btn btn-danger float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Error!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('level.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="kodeLevel">Kode Level:</label>
                            <input type="text" name="kodeLevel" class="form-control" id="kodeLevel" placeholder="Masukkan Kode Level" maxlength="10" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="namaLevel">Nama Level:</label>
                            <input type="text" name="namaLevel" class="form-control" id="namaLevel" placeholder="Masukkan Nama Level" maxlength="100" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection