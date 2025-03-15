@extends('layouts.app')
 
{{-- Customize layout sections --}}
@section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'Edit')
 
{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Level</h3>
            </div>
            <form method="POST" action="{{ route('level.update', $level->level_id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeLevel">Kode Level</label>
                        <input type="text" class="form-control" id="kodeLevel" name="kodeLevel"
                            value="{{ $level->level_kode }}" placeholder="Masukkan kode level">
                    </div>
                    <div class="form-group">
                        <label for="namaLevel">Nama Level</label>
                        <input type="text" class="form-control" id="namaLevel" name="namaLevel"
                            value="{{ $level->level_nama }}" placeholder="Masukkan nama level">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="{{ route('level.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection