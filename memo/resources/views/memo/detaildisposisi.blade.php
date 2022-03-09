@extends('layouts.admin')
@section('title', 'Detail Disposisi Terkirim')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Disposisi Terkirim </h1>
    {{-- <p class="mb-4">Daftar Memo Masuk</p> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-danger" href="/disposisi-keluar">Kembali</a>
        </div>
        <div class="card-body">
             <!-- form start -->
             <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-info">
                            <th colspan="4">Disampaikan Kepada</th>
                        </tr>
                        <tr>
                            
                            <th>No Memo</th>
                            <th>Penerima</th> 
                            <th>Jabatan</th> 
                            <th>Status Dilihat</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($detaildisposisi as $val)
                        <tr>                         
                           
                            <td>{{ $val->no_surat}}</td>
                            <td>{{ $val->Nama}}</td>
                            <td>{{ $val->jabatan}}</td>
                            <td>
                                @if ($val->tgl_disposisi_dilihat == '')
                                <span class="badge badge-danger">Belum Dilihat</span>
                                @else
                                    <span class="badge badge-success">Dilihat Pada {{$val->tgl_disposisi_dilihat}}</span>
                                @endif                             
                            </td>
                           
                        </tr>
                    @endforeach                                       
                   </tbody>
                </table>
            </div>
             <!-- form start -->
             <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-warning">
                            <th colspan="5">Diteruskan Kepada</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>No Memo</th>
                            <th>Jabatan</th> 
                            <th>Status Dilihat</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($detailfrw as $val)
                        <tr>                         
                            <td>{{++$i}}</td>
                            <td>{{ $val->no_surat}}</td>
                            <td>{{ $val->jabatan}}</td>
                            <td>
                                @if ($val->tgl_dibaca == null)
                                <span class="badge badge-dark">Belum Dilihat</span>
                                @else
                                    <span class="badge badge-success">Dilihat Pada {{$val->tgl_dibaca}}</span>
                                @endif                             
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
