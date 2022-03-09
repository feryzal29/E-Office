@extends('layouts.admin')
@section('title', 'Disposisi Keluar')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Disposisi Memo Keluar</h1>
    <p class="mb-4">Daftar Disposisi Memo Keluar</p>
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
                            <th>Tanggal Disposisi</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($disposisi as $item)
                        <tr>                         
                            <td>{{++$i}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->perihal}}</td>
                            <td>{{ date("d-F-Y", strtotime($item->tgl_disposisi))}}</td>
                            <td> 
                            <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/disposisi-keluar/view/{{$item->id_disposisi}}" title="Lihat Disposisi" target="_blank">Lihat</a>
                                    <a class="dropdown-item" href="/disposisi/detail/{{$item->id_disposisi}}">Detail Disposisi</a>
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
