@extends('dashboard.layouts.master')
@section('dashboard')

<div class="container">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Tambah To Do</h5>
            <a href="{{ route('jadwal-pelajaran') }}" class="btn btn-info">Daftar To Do</a>
        </div>
        <div class="card-body">
            <form action="{{ route('update-to-do', $data->id ) }}" method="POST" class="form-group">
                @csrf
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama')is-invalid @enderror" value="{{ old('nama', $data->nama) }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                <label for="keterangan" class="form-label mt-3">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan')is-invalid @enderror" value="{{ old('keterangan', $data->keterangan) }}">
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                <label for="deadline" class="form-label mt-3">Deadline</label>
                <input type="date" value="{{ old('deadline', $data->deadline) }}" name="deadline" class="form-control" id="deadline">
                    @error('deadline')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                <input type="submit" value="Tambah To Do" class="btn btn-success mt-3">
            </form>
        </div>
    </div>
</div>

{{-- <script>
    Swal.fire({
  position: 'bottom-end',
//   icon: 'success',
  title: 'Error !!',
  showConfirmButton: false,
  timer: 1500
})
</script> --}}

@endsection()