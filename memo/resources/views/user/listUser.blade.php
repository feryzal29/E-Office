@extends('layouts.admin')
@section('title', 'List Pengguna')
@section('body')
@include('sweetalert::alert')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">List Pengguna</h1>
    <p class="mb-4">Daftar Pengguna</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            
             <a class="btn btn-primary" href="/tambah-user">Tambah Data</a>
        </div>
        <div class="card-body">
               
            <div class="table-responsive">
                <table id="example1" class="table table-bordered" width="100%"  cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th> 
                            <th>Jabatan</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($getuser as $users)
                        <tr>                         
                            <td>{{ ++$i }}</td>
                            <td>{{ $users->nip}}</td>
                            <td>{{ $users->Nama}}</td>
                            <td>{{ $users->jabatan}}</td>
                            <td>  
                                <a class="btn btn-success editbtn" href="/user/edit/{{$users->id_user}}">
                                     Edit
                                </a>     
                                <a class="btn btn-danger hapususer" href="/user/hapus/{{$users->id_user}}">
                                     Hapus
                                </a>     
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
            
            $('table').on('click','.hapususer', function(){
                var getLink = $(this).attr('href');
                swal.fire({
                        title: 'Hapus User',
                        text: 'Yakim Ingin Hapus Data User',
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
