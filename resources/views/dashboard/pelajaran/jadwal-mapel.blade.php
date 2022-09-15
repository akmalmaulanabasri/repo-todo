@extends('dashboard.layouts.master')
@section('dashboard')

<div class="container">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Daftar Pelajaran</h5>
            <a href="{{ route('tambah-pelajaran') }}" class="btn btn-info">+ Tambah Pelajaran</a>
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
                                <th scope="col">Pelajaran</th>
                                <th scope="col">Guru</th>
                                <th scope="col">Hari</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mapel as $m)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $m->mapel }}</td>
                                <td>{{ $m->guru }}</td>
                                <td>{{ $m->hari }}</td>
                                <td>{{ $m->jam }}</td>
                                <td>{{ $m->ruangan }}</td>
                                <td>
                                    <a href="{{ route('edit-pelajaran', $m->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                    <a href="{{ route('delete-pelajaran', $m->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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

@if(session('success-edit'))
<script>
    Swal.fire({
  position: 'bottom-end',
//   icon: 'success',x
  title: 'Pelajaran Berhasil Diupdate',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif

@if(session('success-add'))
<script>
    Swal.fire({
  position: 'bottom-end',
//   icon: 'success',x
  title: 'Pelajaran Berhasil Ditambahkan',
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
  title: 'Pelajaran Berhasil Dihapus',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif

@endsection()