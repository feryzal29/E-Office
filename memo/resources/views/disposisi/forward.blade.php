@extends('layouts.admin')
@section('title', 'Forward Disposisi')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Forward Disposisi Surat</h1>
    {{-- <p class="mb-4">Isi Form Disposisi Memo dengan Benar</p> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-danger" href="/surat/disposisi/masuk">Kembali</a>
        </div>
        <div class="card-body">
             <!-- form start -->
              <form role="form"  method="post" action="/insert/forward">
              @csrf
                <div class="card-body">
                <input type="hidden" name="idsurat" value="{{$surat->id_surat}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_surat">No Surat</label>
                                <input type="text" class="form-control" id="no_surat" placeholder="Nomor Memo" name="no_surat" value="{{$surat->no_surat}}" readonly>
                                @error('no_surat')
                                        <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <label for="kepada">Diteruskan Kepada</label>
                            <select id="kepada" class="custom-select mr-sm-2 js-example-basic-multiple limit" name="tujuan[]" multiple="multiple">
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
                            <textarea class="form-control" name="isi"></textarea>
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