@extends('layouts.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('penjualan/create') }}">Tambah</a>
        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Penjualan</th>
                    <th>Tanggal</th>
                    <th>Nama Pembeli</th>
                    <th>User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->penjualan_kode }}</td>
                    <td>{{ $item->penjualan_tanggal }}</td>
                    <td>{{ $item->pembeli }}</td>
                    <td>{{ $item->user->nama ?? '-' }}</td>
                    <td>
                        <a href="{{ url('penjualan/' . $item->penjualan_id . '/show') }}" class="btn btn-info btn-sm">Detail</a>

                        <a href="{{ url('penjualan/' . $item->penjualan_id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('penjualan/' . $item->penjualan_id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    </td>

                </tr>
                @endforeach
                @if ($penjualan->count() == 0)
                <tr>
                    <td colspan="6" class="text-center">Tidak ada penjualan</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection