@extends('dashboard.layouts.master')
@section('dashboard')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title">To Do List</h5>
                    </div>
                    <div class="card-body">
                        @foreach($todo as $t)
                         <div class="alert alert-warning d-flex justify-content-between nowrap">
                             <div>
                                <h5>{{ $t->nama }}</h5>
                            </div>
                            <a href="{{ route('success-todo', $t->id) }}" class="btn btn-success"><i class="bi bi-check-square"></i></a>
                        </div>
                        @endforeach
                        @if( count($todo) == 0 )
                                ~ Tidak ada todo yang harus kamu kerjakan :)
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title">Tugas</h5>
                    </div>
                    <div class="card-body">
                        @foreach($tugas as $t)
                         <div class="alert alert-danger d-flex justify-content-between">
                             <p>{{ $t->tugas }}<p>
                             <a href="{{ route('tugas-success', $t->id) }}" class="btn btn-success"><i class="bi bi-check-square"></i></a>
                        </div>
                        @endforeach
                        @if( count($tugas) == 0 )
                                ~ Tidak ada tugas
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title">Pelajaran Hari Ini ({{ $hari }})</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Pelajaran</th>
                                            <th scope="col">Guru</th>
                                            <th scope="col">Jam</th>
                                            <th scope="col">Tugas</th>
                                            <th scope="col">Ruangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($mapel as $m)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $m->mapel }}</td>
                                            <td>{{ $m->guru }}</td>
                                            <td>{{ $m->jam }}</td>
                                            <td>{{ count($m->tugas->where('status', 'Pending')) }}</td>
                                            <td>{{ $m->ruangan }}</td>
                                        </tr>
                                        @endforeach
                                        @if(count($mapel) == 0)
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak Ada Mapel Hari Ini :)</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title">Pelajaran Besok ({{ $besok }})</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Pelajaran</th>
                                            <th scope="col">Guru</th>
                                            <th scope="col">Jam</th>
                                            <th scope="col">Tugas</th>
                                            <th scope="col">Ruangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($mapel_besok as $m)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $m->mapel }}</td>
                                            <td>{{ $m->guru }}</td>
                                            <td>{{ $m->jam }}</td>
                                            <td>{{ count($m->tugas->where('status', 'Pending')) . "/" .  count($m->tugas) }}</td>
                                            <td>{{ $m->ruangan }}</td>
                                        </tr>
                                        @endforeach
                                        @if(count($mapel_besok) == 0)
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak Ada Mapel Besok :)</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @if(session('success-tugas'))
    <script>
    Swal.fire({
  position: 'bottom-end',
  title: 'Tugas Berhasil diselesaikan',
  showConfirmButton: false,
  timer: 2000
})
</script>
@endif

@if(session('success-todo'))
    <script>
    Swal.fire({
  position: 'bottom-end',
  title: 'To Do Berhasil diselesaikan',
  showConfirmButton: false,
  timer: 2000
})
</script>
@endif
    @endsection()