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
          <h3 class="mb-0">Data Mahasiswa</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php">Data Mahasiswa</a></li>

            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
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
              <h3 class="card-title"> Edit Prodi</h3>
            </div>

            <!-- /.card-header -->
            <form action="{{ url('prodi/'. $prodi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="card-body">
                  <div class="form-group">
                    <label for="nama" class="form-label">nama</label>
                    <input type="text" class="form-control @error('nama')is-invalid 
                    @enderror" id="nama" name="nama" value =" {{ $prodi->nama }}"  >
                  @error('nama')
                  <div class ="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  </div>
                  <div class="form-group">
                    <label for="kaprodi" class="form-label">kaprodi</label>
                    <input type="kaprodi" name="kaprodi" id="kaprodi"
                     class="form-control  @error('kaprodi')is-invalid @enderror" >
                    @error('kaprodi')
                  <div class ="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror

                  </div>
                  <div class="form-group">
                    <label for="jurusan" class="form-label">jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" 
                    class="form-control @error('jurusan')is-invalid @enderror"
                    value="{{ old('jurusan', $prodi->jurusan) }}" >
                  @error('jurusan')
                  <div class ="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror    
                </div>
                  <div class="form-group">
                    <label for="foto" class="form-label">foto</label>
                     @if($prodi->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $prodi->foto) }}" alt="Foto Prodi" width="100">
                </div>
            @endif
                    <input type="file" name="foto" id="foto" 
                    class="form-control @error('foto')is-invalid @enderror" >
                  @error('foto')
                  <div class ="invalid-feedback">
                    {{ $message }}
                  </div>    
                  @enderror
                  </div>
                     
              </div>
              <div class="card-footer">
                <a href="{{ url('prodi') }}" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">update</button>
              </div>

            </form>
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

