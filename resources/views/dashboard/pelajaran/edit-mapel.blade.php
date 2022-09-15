@extends('dashboard.layouts.master')
@section('dashboard')

<div class="container">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Edit Pelajaran</h5>
            <a href="{{ route('jadwal-pelajaran') }}" class="btn btn-info">Daftar Pelajaran</a>
        </div>
        <div class="card-body">
            <form action="{{ route('update-pelajaran', $mapel->id) }}" method="POST" class="form-group">
                @csrf
                <label for="mapel" class="form-label mt-3">Nama Mata Pelajaran</label>
                <input type="text" name="mapel" id="mapel" class="form-control @error('mapel')is-invalid @enderror" value="{{ old('mapel', $mapel->mapel) }}">
                    @error('mapel')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                <label for="guru" class="form-label mt-3">Guru</label>
                <input type="text" name="guru" id="guru" class="form-control @error('guru')is-invalid @enderror" value="{{ old('guru', $mapel->guru) }}">
                    @error('guru')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                <label for="hari" class="form-label mt-3">Hari</label>
                {{-- <input type="text" name="hari" id="hari" class="form-control @error('hari')is-invalid @enderror" value="{{ old('hari') }}"> --}}
                <select name="hari" id="" class="form-control @error('hari')is-invalid @enderror">
                    <option value="{{ $mapel->hari }}">{{ $mapel->hari }} (Terpilih)</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
                    @error('hari')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                <label for="jam" class="form-label mt-3">Jam</label>
                <input type="text" name="jam" id="jam" class="form-control @error('jam')is-invalid @enderror" value="{{ old('jam', $mapel->jam) }}">
                    @error('jam')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                
                <label for="ruangan" class="form-label mt-3">Ruangan</label>
                <input type="text" name="ruangan" id="ruangan" class="form-control @error('ruangan')is-invalid @enderror" value="{{ old('ruangan', $mapel->ruangan) }}">
                    @error('ruangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                <input type="submit" value="Update Pelajaran" class="btn btn-success mt-3">
            </form>
        </div>
    </div>
</div>

@endsection()