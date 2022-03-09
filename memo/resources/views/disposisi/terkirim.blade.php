@extends('layouts.admin')
@section('title', 'Disposisi Terkirim')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Disposisi Terkirim</h1>
    <p class="mb-4">Daftar Disposisi Surat Terkirim</p>
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
                            <th>No Memo</th>
                            <th>Perihal</th> 
                            <th>Pengirim</th> 
                            <th>Tanggal Disposisi</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($terkirim as $item)
                        <tr>                         
                            <td>{{++$i}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->pengirim}}</td>
                            <td>{{ $item->perihal}}</td>
                            <td>{{ date("d-F-Y", strtotime($item->tgl))}}</td>
                            <td> 
                             <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/surat/detail/{{$item->id_surat}}" title="Detail Surat">Detail Perjalanan Surat</a>
                                    <a class="dropdown-item" href="/lihat/surat/disposisi/terkirim/{{$item->id_surat}}" title="Lihat Disposisi" target="_blank">Lihat Disposisi</a>
                                    @if (auth()->user()->level == 'admin')
                                        <a class="dropdown-item hapusdisposisi" href="/hapus/surat/disposisi/terkirim/{{$item->id_surat}}" title="Hapus Disposisi" target="_blank">Hapus Disposisi</a>
                                    @endif
                                    
                                   
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

