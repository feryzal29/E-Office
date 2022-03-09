@extends('layouts.admin')
@section('title', 'Detail Forward Disposisi')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Forward Disposisi Keluar</h1>
    {{-- <p class="mb-4">Daftar Forward Disposisi Keluar</p> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-danger" href="/forward/keluar">Kembali</a>
        </div>
        <div class="card-body">
             <!-- form start -->
             <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Diteruskan Kepada</th>
                            <th>Status</th> 
                            <th>Tanggal Dilihat</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($detail as $item)
                        <tr>                         
                            <td>{{++$i}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>
                            @if ($item->status == 1)
                                <span class="badge badge-danger">Belum Dilihat</span>
                                @else
                                <span class="badge badge-success">Sudah Dilihat</span>
                            @endif
                            </td>
                            <td>
                            @if ($item->tgl_dibaca == null)
                                 <span class="badge badge-danger">Belum Dilihat</span>
                            @else
                                <span class="badge badge-success">{{ date("d F Y", strtotime($item->tgl_dibaca))}}</span>
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
