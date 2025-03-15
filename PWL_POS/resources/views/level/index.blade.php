@extends ('layouts.app')

{{-- Customize layout section --}}
@section('subtitle', 'Level')
@section('content_header_title','Home')
@section('content_header_subtitle','Level')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                {{-- Kolom Kiri: Judul --}}
                <div class="col">
                    <h5>Manage Level</h5>
                </div>
                
                {{-- Kolom Kanan: Tombol Add --}}
                <div class="col text-end">
                    <a href="{{ url('/level/create') }}" class="btn btn-success">Add</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            {{ $dataTable -> table() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{ $dataTable -> scripts() }}
@endpush