@extends('layouts.admin')
@section('title', 'Disposisi Masuk')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Disposisi Masuk</h1>
    <p class="mb-4">Daftar Disposisi Surat</p>
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
                            <th>No Surat</th>
                            <th>Perihal</th> 
                            <th>Pengirim Surat</th> 
                            <th>Disposisi Dari</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($masuk as $item)
                        <tr @if($item->tgl_dilihat == null)class="table-info" style="font-weight: 700;"@endif>                         
                            <td>{{++$i}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->perihal}}</td>
                            <td>{{ $item->pengirim}}</td>
                            <td>{{$item->jabatan}}</td>
                            <td> 
                             <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/lihat/surat/disposisi/{{$item->id_surat}}" title="Lihat Disposisi" target="_blank">Lihat Disposisi</a>
                                    <a class="dropdown-item" href="/file/surat/{{$item->file}}" title="Lihat Surat" target="_blank">Lihat Surat</a>
                                    <a class="dropdown-item" href="/forward/surat/disposisi/{{$item->id_surat}}" title="Forward Disposisi">Forward Disposisi</a>
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
        $(document).ready(function($){
             $('table').on('click','.hapusdisposisi', function(){
           
                var getLink = $(this).attr('href');
                swal.fire({
                        title: 'Hapus Disposisi',
                        text: 'Yakim Ingin Hapus Data Disposisi',
                        icon: 'warning',
                        confirmButtonText: 'Hapus',
                        confirmButtonColor: '#d9534f',
                        showCancelButton: true,
                        showConfirmButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = getLink
                        }
                    });
                return false;
            });
        });
	 
    </script>
@endpush

