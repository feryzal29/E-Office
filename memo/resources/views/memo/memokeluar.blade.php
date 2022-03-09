@extends('layouts.admin')
@section('title', 'Memo Keluar')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Memo Keluar</h1>
    <p class="mb-4">Daftar Memo Keluar</p>
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
                            <th>Tanggal Memo</th>
                            <th>Lampiran</th>
                            <th>Status</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($memokeluar as $item)
                        <tr>                         
                            <td>{{++$i}}</td>
                            <td>{{ $item->no_surat}}</td>
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
                                @if ($item->status_konfirm == '2')
                                    <span class="badge badge-success">Disetujui pada {{ date("d F Y", strtotime($item->tgl_konfirm))}}</span>
                                @endif
                                @if ($item->status_konfirm == '1' && $item->mengetahui == 'kosong')
                                     <span class="badge badge-success">Tidak Membutuhkan Konfirmasi</span>
                                
                                @elseif($item->status_konfirm == '1' && $item->mengetahui != 'kosong')
                                    <span class="badge badge-dark">Belum Dikonfirmasi</span>
                                @endif

                                @if ($item->status_konfirm == '3')
                                    {{-- <span class="badge badge-danger">Memo Ditolak</span><br> --}}
                                    <a class="badge badge-warning" data-toggle="collapse" href="#collapseExample-{{$item->id_memo}}" aria-expanded="false" aria-controls="collapseExample">
                                       Memo Ditolak
                                    </a>
                                    <div class="collapse" id="collapseExample-{{$item->id_memo}}">
                                        <div class="card card-body">
                                            {{$item->catatan}}
                                        </div>
                                    </div>
                                @endif                             
                            </td>
                           
                            <td>  
                                <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/memo-keluar/view/{{$item->id_memo}}" target="_blank">Lihat Memo</a>
                                    <a class="dropdown-item" href="/memo/detail/{{$item->id_memo}}">Detail Memo</a>
                                    {{-- <a class="dropdown-item" href="/memo/hapus/{{$item->id_memo}}" onclick="return confirm('Yakin Ingin Hapus Data ?')">Hapus</a> --}}
                                    
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
