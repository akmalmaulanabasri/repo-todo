@extends('dashboard.layouts.master')
@section('dashboard')

<div class="container">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Daftar Tugas</h5>
            <a href="{{ route('tambah-tugas') }}" class="btn btn-info">+ Tambah Tugas</a>
        </div>
        <div class="card-body">
            <form action="#" method="get">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group">
                            <input type="text" class="form-control" name="cari" placeholder="Cari...">
                            <div class="input-group-append">
                                {{-- <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <select name="hari" id="" class="form-control">
                                <option value="">Hari</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <div class="table">
                    <table class="table table-striped table-bordered table-hover mt-2">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                                <th scope="col">Tugas</th>
                                <th scope="col">Mapel</th>
                                <th scope="col">Materi</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Level</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tugas as $t)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $t->tugas }}</td>
                                <td>{{ $t->mapel }}</td>
                                <td>{{ $t->materi }}</td>
                                <td>{{ $t->deadline }}</td>
                                <td>{{ $t->level }}</td>
                                <td>
                                    <a href="{{ route('edit-tugas', $t->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                    <a href="{{ route('delete-tugas', $t->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success-add'))
<script>
    Swal.fire({
  position: 'bottom-end',
//   icon: 'success',x
  title: 'Tugas Berhasil Ditambahkan',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif

@if(session('success-update'))
<script>
    Swal.fire({
  position: 'bottom-end',
//   icon: 'success',x
  title: 'Tugas Berhasil Diupdate',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif

@if(session('success-delete'))
<script>
    Swal.fire({
  position: 'bottom-end',
//   icon: 'success',x
  title: 'Tugas Berhasil Dihapus',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif

@endsection()