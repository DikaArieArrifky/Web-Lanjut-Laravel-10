@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a href="{{ url('penjualan') }}" class="btn btn-sm btn-default">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th style="width: 200px;">Kode Penjualan</th>
                    <td>{{ $penjualan->penjualan_kode }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $penjualan->penjualan_tanggal }}</td>
                </tr>
                <tr>
                    <th>Nama Pembeli</th>
                    <td>{{ $penjualan->pembeli }}</td>
                </tr>
                <tr>
                    <th>User</th>
                    <td>{{ $penjualan->user->nama ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
