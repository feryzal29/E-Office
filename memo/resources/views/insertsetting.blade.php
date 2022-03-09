@extends('layouts.admin')
@section('title', 'Setting')
@section('body')


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Setting</h1>
    {{-- <p class="mb-4">Isi Form Memo dengan Benar</p> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <a class="btn btn-danger" href="/list-user">Kembali</a>
        </div> --}}
        <div class="card-body">
             <!-- form start -->
              <form role="form"  method="post" action="/insert-setting" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="instansi">Nama Instansi</label>
                            <input type="text" class="form-control" id="instansi" placeholder="Nama Instansi" name="instansi" value="{{old('instansi')}}" required>
                            @error('instansi')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>    
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="moto">Motto</label>
                            <input type="text" class="form-control" id="moto" placeholder="Motto Instansi" name="moto" value="{{old('moto')}}" required>
                            @error('moto')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" placeholder="Alamat Instansi" name="alamat" value="{{old('alamat')}}" required>
                            @error('alamat')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telp">Telepon Instansi</label>
                            <input type="text" class="form-control" id="telp" placeholder="Telepon Instansi" name="telp" value="{{old('telp')}}" required>
                            @error('telp')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fax">FAX Instansi</label>
                            <input type="text" class="form-control" id="fax" placeholder="FAX Instansi" name="fax" value="{{old('fax')}}" required>
                            @error('fax')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="logo">Logo Instansi</label>
                            <input type="file" class="form-control" id="logo"  name="logo" value="{{old('logo')}}" required>
                            @error('logo')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>    
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger" name="kirim">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
@push('after-script')
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

@endpush