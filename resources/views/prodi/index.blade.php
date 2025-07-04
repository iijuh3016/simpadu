@extends('template.main')

@section('content')
   
<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Daftar prodi</h3>
                            <div class="card-tools">
                                <a href="/prodi/create" class="btn btn-primary">Tambah prodi</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>kaprodi</th>
                                    <th>jurusan</th>
                                    <th>foto</th>
                                    <th>Aksi</th>

                                </thead>
                                <tbody>
                                  
                                    @foreach ($prodi as $p) 
                                        <tr>
                                            <td>{{  $loop->iteration }}</td>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->kaprodi }}</td>
                                            <td>{{ $p->jurusan }}</td>
                                            <td>
                                                 @if($p->foto)
            <img src="{{ asset('storage/' . $p->foto) }}" alt="Foto Prodi" width="120" height="100">
        @else
            <span>Tidak ada foto</span>
        @endif
    </td>
                                            <td><a href="{{ url('prodi/' .  $p->id . '/edit') }}" class="btn btn-warning">Edit</a> |
                                                <form action="{{ url('prodi/' . $p->id) }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('handak mehapus kah?')" class="btn btn-danger">delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->
@endsection