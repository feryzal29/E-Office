@extends('layouts.admin')
@section('title', 'Detail Disposisi')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Perjalanan Surat</h1>
    <p class="mb-4">Detail Perjalanan Surat</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-danger" href="/surat/disposisi/terkirim">Kembali</a>
        </div>
        <div class="card-body">
             <!-- form start -->
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-info">
                            <th colspan="3">Disampaikan Kepada</th>
                        </tr>
                        <tr>
                            <th>No Surat</th>
                            <th>Kepada</th> 
                            <th>Status</th> 
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($detail as $item)
                        <tr>                         
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>
                                @if ($item->tgl_dilihat == null)
                                    <span class="badge badge-dark">Belum Dilihat</span>
                                @else
                                    <span class="badge badge-success">Sudah Dilihat {{ date("d-F-Y", strtotime($item->tgl_dilihat))}}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach                                       
                   </tbody>
                </table>
            </div>   
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                     `  <tr class="table-warning">
                            <th colspan="3">Diteruskan Kepada</th>
                        </tr>
                        <tr>
                            <th>No Surat</th>
                            <th>Kepada</th> 
                            <th>Status</th> 
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($forward as $item)
                        <tr>                         
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>
                                @if ($item->tgl_dibaca == null)
                                    <span class="badge badge-dark">Belum Dilihat</span>
                                @else
                                    <span class="badge badge-success">Sudah Dilihat {{date("d-F-Y", strtotime($item->tgl_dibaca))}}</span>
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

