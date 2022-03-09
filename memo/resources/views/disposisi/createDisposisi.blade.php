@extends('layouts.admin')
@section('title', 'Disposisi Surat')
@section('body')


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Disposisi Surat</h1>
    <p class="mb-4">Disposisi Surat dari Luar Rumah Sakit</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <a class="btn btn-danger" href="/list-user">Kembali</a>
        </div> --}}
        <div class="card-body">
             <!-- form start -->
            <form role="form"  method="post" action="/insert/surat" enctype="multipart/form-data">
              @csrf
            <div class="card-body">
               
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_surat">No Surat</label>
                            <input type="text" class="form-control" id="no_surat" placeholder="Nomor Surat" name="no_surat" value="{{old('no_surat')}}" required>
                            @error('no_surat')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label for="sifat">Sifat</label>
                              <select class="custom-select mr-sm-2" id="sifat" name="sifat"  required>
                                <option value="" selected>Pilih...</option>
                                <option value="biasa" value="{{old('sifat') == "biasa" ? 'selected' : ''}}">Biasa</option>
                                <option value="rahasia" value="{{old('sifat') == "rahasia" ? 'selected' : ''}}">Rahasia</option>
                                <option value="terbatas" value="{{old('sifat') == "terbatas" ? 'selected' : ''}}">Terbatas</option>
                               
                              </select>
                            @error('sifat')
                             <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>   
                </div>
                <!--End Row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pengirim">Nama Pengirim</label>
                            <input type="text" class="form-control" id="pengirim" placeholder="Pengirim" name="pengirim" value="{{old('pengirim')}}" required>
                            @error('pengirim')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat">Alamat Pengirim</label>
                            <input type="text" class="form-control" id="alamat" placeholder="Alamat Pengirim" name="alamat" value="{{old('alamat')}}" required>
                            @error('alamat')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>   
                </div>
                <!--End Row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl">Tanggal Penerimaan Surat</label>
                            <input type="date" class="form-control" id="tgl" name="tgl" value="{{old('tgl')}}" required>
                            @error('tgl')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" placeholder="Perihal" name="perihal" value="{{old('perihal')}}" required>
                            @error('perihal')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                     </div>
                </div>
                <!--End Row-->
                    
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="kepada">Disposisi Kepada</label>
                                <select id="kepada" class="custom-select mr-sm-2 js-example-basic-multiple penerima limit" name="kepada[]" multiple="multiple">
                                    @foreach ( $user as $users )
                                        <option value="{{$users->jabatan_id}}">{{$users->Nama}} ({{$users->jabatan}})</option>
                                    @endforeach
                                   
                                </select>
                                @error('kepada')
                                <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="lampiran">Scan File Surat</label>
                            <input type="file" class="form-control" id="lampiran"  name="lampiran">
                            @error('lampiran')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="lampiran">Isi Disposisi</label>
                             <textarea class="form-control" name="isi_disposisi"></textarea>
                            @error('lampiran')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger" name="kirim">Kirim</button>
                </div>
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
        $(".penerima").select2({
            placeholder: "Kepada"
        });
        $(".limit").select2({
        maximumSelectionLength: 1
        });
    });
</script> 
@endpush