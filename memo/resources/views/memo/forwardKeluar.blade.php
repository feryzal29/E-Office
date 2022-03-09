@extends('layouts.admin')
@section('title', 'Forward Disposisi Keluar')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Forward Disposisi Keluar</h1>
    <p class="mb-4">Daftar Forward Disposisi Keluar</p>
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
                            <th>Disposisi Dari</th> 
                            <th>File Memo</th>
                            <th>Lampiran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($forwardkeluar as $item)
                        <tr>                         
                            <td>{{++$i}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>
                             <a href="/memo-disposisi/view/{{ $item->id_memo}}" class="badge badge-primary" target="_blank">View</a>
                            </td>
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
                                    <a class="dropdown-item" href="/forward/disposisi/view/{{$item->id_disposisi_frw}}" target="_blank">Lihat Disposisi</a>
                                    <a class="dropdown-item" href="/detail/forward/{{$item->id_forward}}">Detail Forward</a>
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
