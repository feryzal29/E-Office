@extends('layouts.admin')
@section('title', 'Jabatan')
@section('body')


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Jabatan</h1>
    {{-- <p class="mb-4">Tambah Data Pengguna</p> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-danger" href="/list-jabatan">Kembali</a>
        </div>
        <div class="card-body">
             <!-- form start -->
              <form role="form" action="/insert-jabatan" method="post" >
              @csrf
                <div class="card-body">
              
                  
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode">Kode Jabatan</label>
                            <input type="text" class="form-control" id="kode" placeholder="Kode Jabatan" name="kode" value="{{$kode}}" required Readonly>
                            
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="jabatan" class="form-control" id="jabatan" placeholder=" Nama Jabatan" name="jabatan" required>
                            @error('jabatan')
                             <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                     </div>
                    </div>
                   
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger" name="simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection