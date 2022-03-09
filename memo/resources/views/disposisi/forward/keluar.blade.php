@extends('layouts.admin')
@section('title', 'Forward Keluar')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Forward Keluar</h1>
    <p class="mb-4">Daftar Forward Disposisi Surat Terkirim</p>
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
                            <th>Penerima</th>
                            <th>Tanggal Disposisi Forward</th> 
                            <th>Status</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($keluar as $item)
                        <tr>                         
                            <td>{{++$i}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>{{ date("d-F-Y", strtotime($item->tgl_forward))}}</td>
                            <td>
                            @if ($item->tgl_dibaca == null)
                               <span class="badge badge-dark">Belum Dilihat</span>
                            @else
                              <span class="badge badge-success">Sudah Dilihat pada {{$item->tgl_dibaca}}</span>
                            @endif
                            
                            </td>
                            <td> 
                             <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    
                                    <a class="dropdown-item" href="/file/surat/{{$item->file}}" title="Lihat Surat" target="_blank">Lihat Surat</a>
                                    <a class="dropdown-item" href="/lihat/disposisi/keluar/{{$item->id_surat}}" title="Lihat Disposisi" target="_blank">Lihat Disposisi</a>
                                   
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
            $('.hapusdisposisi').on('click',function(){
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

