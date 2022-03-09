@extends('layouts.admin')
@section('title', 'Konfirmasi Memo')
@section('body')
<!-- Page Heading -->
<!-- Modal Edit Data -->
<div class="modal fade" id="formtolak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Catatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="tolak">
        
            <div class="modal-body">
            @csrf
            {{ method_field('PUT')}}
                    <input type="hidden" id="nomemo" name="nomemo">
                    <div class="form-group">
                        <label for="catatan" class="col-form-label">Alasan Memo Ditolak</label>
                        <textarea class="form-control"  name="catatan" required></textarea>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tolak</button>
            </div>
        </form>
    </div>
  </div>
</div>
<h1 class="h3 mb-2 text-gray-800">Konfirmasi Memo</h1>
    <p class="mb-4">Daftar Memo yang Membutuhkan Persetujuan</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <a class="btn btn-danger" href="/list-user">Kembali</a>
        </div> --}}
        <div class="card-body">
             <!-- form start -->
             <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="display:none" >No Memo</th>
                            <th>No Memo</th>
                            <th>Dari</th> 
                            <th>Perihal</th> 
                            <th>Tanggal Memo</th> 
                            <th>Lampiran</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($konfirm as $item)
                        <tr>                         
                            <td>{{++$i}}</td>
                            <td style="display:none">{{ $item->id_memo}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>{{ $item->perihal}}</td>
                            <td>{{ date("d F Y", strtotime($item->tgl_surat))}}</td>
                            <td>
                                @if ($item->lampiran == null)
                                <span class="badge badge-dark">Tidak Ada</span>
                                @else
                                    <a href="/file/lampiran/{{$item->lampiran}}" class="badge badge-primary" target="_blank">View</a>
                                @endif
                            </td>
                            <td>  
                                <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/konfirmasi-memo/view/{{$item->id_memo}}" target="_blank">Lihat</a>
                                    <a class="dropdown-item" href="/memo/setuju/{{$item->id_memo}}">Setuju</a>
                                    <a class="dropdown-item btntolak" href="#">Tolak</a>
                                </div>  
                            </td>
                        </tr>
                    @endforeach                                       
                   </tbody>
                </table>
            </div>
              
        </div>
    </div>
</div>
@endsection
@push('after-script')
<script>
$(document).ready(function(){
    $('table').on('click','.btntolak',function(){
        $('#formtolak').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        $('#nomemo').val(data[1]);
    });
     //Update
    $('#tolak').on('submit', function(e){
        e.preventDefault();
        //var kode = $('#nomemo').val();

        $.ajax({
            type : "GET",
            url  : "/memo/tolak",
            data : $('#tolak').serialize(),
            success: function(response){
                console.log(response)
                $('#formtolak').modal('hide')
                  Swal.fire({
                            icon: 'error',
                            title: 'Berhasil',
                            text: 'Memo Berhasil Ditolak',
                            confirmButtonText: 'Ok',
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                               location.reload();
                            } 
                            });
                       
                  //alert()->success('Title','Lorem Lorem Lorem');
            },
            error:function(error){
                console.log(error)
              
            }
        });
    });

});
</script>

@endpush
