@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah User
                    <a href="{{ route('user.index') }}" class="btn btn-danger float-end">Kembali</a>
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
                    
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="level_id">Level:</label>
                            <select name="level_id" class="form-control" id="level_id" required>
                                <option value="">Pilih Level</option>
                                @foreach($levels as $level)
                                    <option value="{{ $level->level_id }}">{{ $level->level_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="username">Username:</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username" maxlength="50" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" maxlength="100" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="password_confirmation">Konfirmasi Password:</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Konfirmasi Password" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection