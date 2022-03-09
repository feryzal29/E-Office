@extends('layouts.admin')
@section('title', 'Disposisi Masuk')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Disposisi Masuk</h1>
    <p class="mb-4">Daftar Disposisi Memo Masuk</p>
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
                   
                    @foreach ($dismasuk as $item)
                        <tr @if ($item->tgl_disposisi_dilihat == null)class="table-info" style="font-weight: 700;"@endif>                         
                            <td>{{++$i}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->perihal}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>{{ date("d-F-Y", strtotime($item->tgl_disposisi))}}</td>
                            <td> 
                             <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/memo-disposisi/view/{{$item->id_memo_disposisi}}" title="Lihat Memo" target="_blank">Lihat Memo</a>
                                    @if ($item->lampiran == null)

                                    @else
                                        <a class="dropdown-item" href="/file/lampiran/{{$item->lampiran}}" title="Lihat Lampiran" target="_blank">Lihat Lampiran</a>
                                    @endif
                                    <a class="dropdown-item" href="/disposisi/view/{{$item->id_disposisi}}" title="Lihat Disposisi" target="_blank">Lihat Disposisi</a>
                                    <a class="dropdown-item" href="/disposisi/forward/{{$item->id_disposisi}}">Forward Disposisi</a>
                                    @if (auth()->user()->level == 'admin')
                                    <a class="dropdown-item hapusdisposisi" href="/disposisi/hapus/{{$item->id_disposisi}}">Hapus Disposisi</a>
                                    @endif
                                    {{-- /disposisi/hapus/{{$item->id_disposisi}} --}}
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
            $('table').on('click','.hapusdisposisi',function(){
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

