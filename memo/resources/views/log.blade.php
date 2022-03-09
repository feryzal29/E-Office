@extends('layouts.admin')
@section('title', 'History Aktivitas Sistem')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">History Aktivitas Sistem</h1>
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
                            
                            <th>Pengguna</th>
                            <th>Aksi</th> 
                            <th>No Memo / Surat</th> 
                            <th>Waktu</th> 
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($log as $item)
                        <tr>                         
                           
                            <td>{{ $item->pengguna}} <b>({{ $item->jabatan}})</b></td>
                            <td><i>{{ $item->aksi}}</i></td>
                            <td>{{ $item->memo}}</td>
                            <td>{{ date("d F Y", strtotime($item->tanggal))}},{{$item->jam}}</td>
                            {{-- <td> 
                             <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/lihat/surat/disposisi/{{$item->id_surat}}" title="Lihat Disposisi" target="_blank">Lihat Disposisi</a>
                                    <a class="dropdown-item" href="/file/surat/{{$item->file}}" title="Lihat Surat" target="_blank">Lihat Surat</a>
                                    <a class="dropdown-item" href="/forward/surat/disposisi/{{$item->id_surat}}" title="Forward Disposisi">Forward Disposisi</a>
                                </div>   
                               
                            </td> --}}
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

