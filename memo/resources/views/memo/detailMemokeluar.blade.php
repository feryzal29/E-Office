@extends('layouts.admin')
@section('title', 'Detail Memo Keluar')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Memo Keluar </h1>
    {{-- <p class="mb-4">Daftar Memo Masuk</p> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-danger" href="/memo-keluar">Kembali</a>
        </div>
        <div class="card-body">
             <!-- form start -->
             <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Memo</th>
                            <th>Penerima</th> 
                            <th>Jabatan</th> 
                            <th>Tanggal Memo</th> 
                           
                            
                            <th>Status Dilihat</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($detailMemo as $val)
                        <tr>                         
                            <td>{{++$i}}</td>
                            <td>{{ $val->no_surat}}</td>
                            <td>{{ $val->Nama}}</td>
                            <td>{{ $val->jabatan}}</td>
                            <td>{{ date("d F Y", strtotime($val->tgl_surat))}}</td>
                            
                            <td>
                                @if ($val->status == 'sudah')
                                    <span class="badge badge-success">Sudah Dilihat pada {{ date("d F Y", strtotime($val->tgl_lihat))}}</span>
                                @else
                                    <span class="badge badge-danger">Belum Dilihat</span>
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
