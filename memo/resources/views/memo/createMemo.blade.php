@extends('layouts.admin')
@section('title', 'Buat Memo')
@section('body')


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Buat Memo</h1>
    <p class="mb-4">Isi Form Memo dengan Benar</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <a class="btn btn-danger" href="/list-user">Kembali</a>
        </div> --}}
        <div class="card-body">
             <!-- form start -->
              <form role="form" id="memoForm" method="post" action="/insert-memo" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                {{-- <input type="hidden" id="pengguna" value="{{auth()->user()->Nama}}"> --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_memo">No Memo</label>
                            <input type="text" class="form-control" id="no_memo" placeholder="Nomor Memo" name="no_memo" value="{{old('no_memo')}}" required>
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
                     <div class="col-md-6">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" placeholder="Perihal" name="perihal" required>
                            @error('perihal')
                                    <small style="color:red">- {{ $message}}</small>
                            @enderror
                     </div>
                    </div>
                   
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="kepada">Kepada</label>
                                <select id="kepada" class="custom-select mr-sm-2 js-example-basic-multiple kepada" name="kepada[]" multiple="multiple">
                                   
                                    @foreach ( $jabatan as $item )
                                         <option value="{{$item->jabatan}}">{{$item->jabatan}}</option>
                                    @endforeach
                                </select>
                            @error('kepada')
                             <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="tembusan">Tembusan</label>
                                <select id="tembusan" class="custom-select mr-sm-2 js-example-basic-multiple cc" name="cc[]" multiple="multiple">
                                    @foreach ( $jabatan as $item )
                                        <option value="{{$item->jabatan}}">{{$item->jabatan}}</option>
                                    @endforeach
                                   
                                </select>
                            @error('tembusan')
                             <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                     </div>
                     
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="penerima">User yang Menerima</label>
                                <select id="penerima" class="custom-select mr-sm-2 js-example-basic-multiple penerima" name="penerima[]" multiple="multiple">
                                    @foreach ( $user as $users )
                                        <option value="{{$users->jabatan_id}}">{{$users->Nama}} ({{$users->jabatan}})</option>
                                    @endforeach
                                   
                                </select>
                                @error('penerima')
                                <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="mengetahui">Mengetahui</label>
                                <select class="custom-select mr-sm-2" id="mengetahui" name="mengetahui"  required>
                                    <option value="" selected>Pilih...</option>
                                    @if (auth()->user()->level == 'kabag' || auth()->user()->level == 'dirut')
                                         <option value="kosong">Tanpa Mengetahui</option>
                                    @endif
                                    @foreach ($mengetahui as $item)
                                        <option value="{{$item->jabatan_id}}">{{$item->Nama}} ({{$item->jabatan}})</option>
                                    @endforeach
                                
                                </select>
                                @error('mengetahui')
                                <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                             <label for="isi">Isi Memo</label>
                             <textarea id="mytextarea" name="isimemo" style="height"></textarea>
                            {{-- <textarea class="ckeditor" id="ckeditor" name="isimemo"></textarea> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="lampiran">Lampiran</label>
                            <input type="file" class="form-control" id="lampiran"  name="lampiran">
                            @error('lampiran')
                                    <small style="color:red">- {{ $message}}</small>
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
<script src="/vendor/tinymce/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
  tinymce.init({
    selector: '#mytextarea',
    plugins: 'table',
    menubar: 'table',  
  });
  </script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();

        $(".kepada").select2({
            placeholder: "Kepada"
        });
        $(".cc").select2({
            placeholder: "CC"
        });
        $(".penerima").select2({
            placeholder: "Pilih Yang Di Input di Kepada dan Tembusan/CC"
        });
    });
</script> 

@endpush