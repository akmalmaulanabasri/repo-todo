@extends('dashboard.layouts.master')
@section('dashboard')

<div class="container">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Tambah Tugas</h5>
            <a href="{{ route('jadwal-pelajaran') }}" class="btn btn-info">Daftar Tugas</a>
        </div>
        <div class="card-body">
            <form action="{{ route('buat-tugas') }}" method="POST" class="form-group">
                @csrf
                <label for="tugas" class="form-label mt-3">Nama Tugas</label>
                <input type="text" name="tugas" id="tugas" class="form-control @error('tugas')is-invalid @enderror" value="{{ old('tugas') }}">
                    @error('tugas')
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

                <label for="materi" class="form-label mt-3">Materi</label>
                <input type="text" name="materi" id="materi" class="form-control @error('materi')is-invalid @enderror" value="{{ old('materi') }}">
                    @error('materi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                <label for="deadline" class="form-label mt-3">Deadline</label>
                <input type="date" name="deadline" id="deadline" class="form-control @error('deadline')is-invalid @enderror" value="{{ old('deadline') }}">
                    @error('deadline')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                <label for="level" class="form-label mt-3">Prioritas</label>
                <select name="level" id="" class="form-control @error('level')is-invalid @enderror">
                    <option value="">Pilih...</option>
                    <option value="Wajib">Wajib</option>
                    <option value="Opsional">Opsional</option>
                    <option value="Sunnah">Sunnah</option>
                </select>
                    @error('level')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                <input type="submit" value="Tambah Tugas" class="btn btn-success mt-3">
            </form>
        </div>
    </div>
</div>

@endsection()