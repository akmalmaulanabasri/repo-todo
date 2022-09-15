@extends('dashboard.layouts.master')
@section('dashboard')

<div class="container">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Daftar To Do List</h5>
            <a href="{{ route('add-to-do') }}" class="btn btn-info">+ Buat ToDo Baru</a>
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
                                <th scope="col">Nama</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Tanggal Dibuat</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->keterangan}}</td>
                                <td>{{ date('d-m-Y', strtotime($d->created_at)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($d->deadline)) }}</td>
                                <td class="d-flex justify-content-center">
                                    @if($d->status == "Pending")
                                        <div class="btn btn-warning rounded-pill px-5 btn-elevated">
                                            {{ $d->status }}
                                        </div>
                                    @elseif($d->status == "Selesai")
                                        <div class="btn btn-success rounded-pill px-5 btn-elevated">
                                            {{ $d->status }}
                                        </div>
                                    @elseif($d->status == "Dibatalkan")
                                        <div class="btn btn-secondary rounded-pill px-5 btn-elevated">
                                            {{ $d->status }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('edit-to-do', $d->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                    <a href="{{ route('delete-to-do', $d->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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

@if(session('success-update'))
<script>
    Swal.fire({
  position: 'bottom-end',
//   icon: 'success',x
  title: 'To Do Berhasil Diupdate',
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
  title: 'To Do Berhasil Ditambahkan',
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
  title: 'To Do Berhasil Dihapus',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif

@endsection()