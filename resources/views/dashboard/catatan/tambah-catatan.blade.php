@extends('dashboard.layouts.master')
@section('dashboard')

<div class="container">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Tambah Pelajaran</h5>
            {{-- <a href="{{ route('jadwal-pelajaran') }}" class="btn btn-info">Daftar Pelajaran</a> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('buat-catatan') }}" method="POST" class="form-group">
                @csrf
                <label for="judul" class="form-label mt-3">Judul Catatan</label>
                <input type="text" name="judul" id="judul" class="form-control @error('judul')is-invalid @enderror" value="{{ old('judul') }}">
                    @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                <label for="mapel" class="form-label mt-3">Mapel</label>
                <input type="text" name="mapel" id="mapel" class="form-control @error('mapel')is-invalid @enderror" value="{{ old('mapel') }}">
                    @error('mapel')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    
                <label for="isi" class="form-label mt-3">Isi Catatan</label>
                <input  id="x"  type="hidden" name="isi" id="isi" class="form-control @error('isi')is-invalid @enderror" value="{{ old('isi') }}">
                {{-- <input id="x" value="Editor content goes here" type="hidden" name="content"> --}}
                <trix-editor input="x"></trix-editor>
                @error('isi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                {{-- <label for="materi" class="form-label mt-3">Materi</label>
                <input type="text" name="materi" id="materi" class="form-control @error('materi')is-invalid @enderror" value="{{ old('materi') }}">
                    @error('materi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror --}}

                <input type="submit" value="Tambah Catatan" class="btn btn-success mt-3">
            </form>
        </div>
    </div>
</div>

@endsection()