@extends('layouts.admin')
@section('title', 'Disposisi Memo')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Disposisi Memo</h1>
    <p class="mb-4">Isi Form Disposisi Memo dengan Benar</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-danger" href="/memo-masuk">Kembali</a>
        </div>
        <div class="card-body">
             <!-- form start -->
              <form role="form"  method="post" action="/insert-disposisi">
              @csrf
                <div class="card-body">
                <input type="hidden" name="idmemo" value="{{$disposisi->id_memo}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_memo">No Memo</label>
                                <input type="text" class="form-control" id="no_memo" placeholder="Nomor Memo" name="no_memo" value="{{$disposisi->no_surat}}" required readonly>
                                @error('no_memo')
                                        <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sifat">Sifat</label>
                                <select class="custom-select mr-sm-2" id="sifat" name="sifat"  required>
                                    <option value="" selected>Choose...</option>
                                    <option value="Sangat Segera" value="{{old('Sangat Segera') == "biasa" ? 'selected' : ''}}">Sangat Segera</option>
                                    <option value="Segera" value="{{old('Segera') == "rahasia" ? 'selected' : ''}}">Segera</option>
                                    <option value="Rahasia" value="{{old('Rahasia') == "terbatas" ? 'selected' : ''}}">Rahasia</option>
                                    
                                </select>
                                @error('sifat')
                                <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" placeholder="Perihal" name="perihal" value="{{$disposisi->perihal}}" required readonly>
                            @error('perihal')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">                   
                        <div class="col-md-6">
                            <label for="pengirim">Pengirim</label>
                            <input type="hidden" value="{{$disposisi->jabatan_pengirim}}" name="jabatan_pengirim">
                            <input type="text" class="form-control" id="pengirim" placeholder="pengirim" name="pengirim" value="{{$disposisi->Nama}}" required readonly>
                            @error('pengirim')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" placeholder="jabatan" name="jabatan" value="{{$disposisi->jabatan}}" required readonly>
                            @error('jabatan')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tgl_memo">Tanggal Memo</label>
                            <input type="text" class="form-control" id="tgl_memo" placeholder="Tanggal Memo" name="tgl_memo" value="{{ $disposisi->tgl_surat}}" required readonly>
                            @error('tgl_memo')
                                <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <label for="kepada">Kirim Kepada</label>
                            <select id="kepada" class="custom-select mr-sm-2 js-example-basic-multiple limit" name="kepada[]" multiple="multiple">
                                @foreach ( $user as $users )
                                    <option value="{{$users->jabatan_id}}">{{$users->Nama}} ({{$users->jabatan}})</option>
                                @endforeach
                                   
                            </select>
                            @error('kepada')
                            <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="disposisi">isi Disposisi</label>
                            <textarea class="form-control" name="isi_disposisi"></textarea>
                            @error('disposisi')
                                <div class="invalid-tooltip">
                                     {{$message}}
                                </div>                        
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger" name="kirim">Kirim</button>
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
    $(".limit").select2({
     maximumSelectionLength: 1
    });
});
</script>

@endpush