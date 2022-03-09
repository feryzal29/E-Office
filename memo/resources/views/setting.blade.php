@extends('layouts.admin')
@section('title', 'Setting Sistem')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Setting Sistem</h1>
    {{-- <p class="mb-4">Isi Form Memo dengan Benar</p> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <a class="btn btn-danger" href="/list-user">Kembali</a>
        </div> --}}
        <div class="card-body">
             <!-- form start -->
              
              @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                        <div class="form-group">
                            <label for="logo">Logo Instansi</label>
                            <img src="image/setting/{{$edit->logo}}" title="logo" style="width: 70%;">
                        </div>
                        </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="instansi">Nama Instansi</label>
                                            <input type="text" class="form-control" id="instansi" placeholder="Nama Instansi" name="instansi" value="{{$edit->nama_instansi}}" required readonly>
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
                                            <input type="text" class="form-control" id="moto" placeholder="Motto Instansi" name="moto" value="{{$edit->motto}}" required readonly>
                                            @error('moto')
                                                    <small style="color:red">- {{ $message}}</small>
                                            @enderror
                                        </div>
                                    </div>    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" placeholder="Alamat Instansi" name="alamat" value="{{$edit->alamat}}" required readonly>
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
                                            <input type="text" class="form-control" id="telp" placeholder="Telepon Instansi" name="telp" value="{{$edit->telepon}}" required readonly>
                                            @error('telp')
                                                    <small style="color:red">- {{ $message}}</small>
                                            @enderror
                                        </div>
                                    </div>    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fax">FAX Instansi</label>
                                            <input type="text" class="form-control" id="fax" placeholder="FAX Instansi" name="fax" value="{{$edit->fax}}" required readonly>
                                            @error('fax')
                                                    <small style="color:red">- {{ $message}}</small>
                                            @enderror
                                        </div>
                                    </div>    
                                </div>
                            </div>
                                    
                
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a class="btn btn-primary" name="ganti" href="setting/edit/{{$edit->id_setting}}">Ganti</a>
                </div>
           
        </div>
    </div>
</div>



@endsection
