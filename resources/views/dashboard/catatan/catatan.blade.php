@extends('dashboard.layouts.master')
@section('dashboard')

<div class="container">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">{{ $catatan->judul }} - {{ $catatan->mapel }}</h5>
            <a href="#" class="btn btn-danger">Edit Catatan Ini</a>
        </div>
        <div class="card-body">
            <hr>

            <p>{!! $catatan->isi !!}</p>
            
        </div>
    </div>
    <a href="{{ route('daftar-catatan') }}" class="btn btn-warning mb-3">Kembali Ke Daftar Catatan</a>
</div>

@endsection()