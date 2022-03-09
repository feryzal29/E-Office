@extends('layouts.admin')
@section('title', 'List Jabatan')
@section('body')

<!-- Modal Tambah Data -->
<div class="modal fade" id="addJabatanmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
     
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="addjabatan">
            @csrf
            <div class="modal-body">
                   
                    <div class="form-group">
                        <label for="kode" class="col-form-label">Kode Jabatan</label>
                        <input type="text" class="form-control" name="kode" value="{{$kode}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jabatan" class="col-form-label">Jabatan</label>
                        <input type="text" class="form-control"  name="jabatan" required>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="editJabatanmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
     
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="editjabatan">
        @csrf
            {{ method_field('PUT')}}
            <div class="modal-body">
            
                    <div class="form-group">
                        <label for="kode" class="col-form-label">Kode Jabatan</label>
                        <input type="text" class="form-control" id="kode" name="kode" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jabatan" class="col-form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">List Jabatan</h1>
    <p class="mb-4">Daftar Jabatan</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addJabatanmodal">
                Tambah Data
            </button>     
        </div>
        <div class="card-body">
               
            <div class="table-responsive">
                <table id="example1" class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Jabatan</th>
                            <th>Nama Jabatan</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($jabatan as $jab)
                        <tr>                         
                            <td>{{ ++$i }}</td>
                            <td>{{ $jab->id}}</td>
                            <td>{{ $jab->jabatan}}</td>
                            <td>  
                                <a class="btn btn-success editbtn" href="#">
                                     Edit
                                </a>     
                                <a class="btn btn-danger hapusbtn" href="/jabatan/hapus/{{$jab->id}}">
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

//ADD Jabatan
$(document).ready(function(){
    
     
    $('#addjabatan').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type : "POST",
            url: "/insert-jabatan",
            data : $('#addjabatan').serialize(),
            success: function(response){
                console.log(response)
                $('#addJabatanmodal').modal('hide')
                 Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Jabatan Berhasil Disimpan',
                            confirmButtonText: 'Ok',
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                               location.reload();
                            } 
                            });
                   
            },
            error:function(error){
                console.log(error)
                Swal.fire(
                        'Gagal',
                        'Data Gagal Disimpan',
                        'error'
                        );
                        location.reload(); 
            }
        });
    }); 
//edit
    $('table').on('click','.editbtn',function(){
        
        $('#editJabatanmodal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        $('#kode').val(data[1]);
        $('#jabatan').val(data[2]);
    });

    //Update
    $('#editjabatan').on('submit', function(e){
        e.preventDefault();
        var kode = $('#kode').val();

        $.ajax({
            type : "PUT",
            url  : "/update-jabatan/"+kode,
            data : $('#editjabatan').serialize(),
            success: function(response){
                console.log(response)
                $('#editJabatanmodal').modal('hide')
                  location.reload();
                  Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Jabatan Berhasil Diubah',
                            confirmButtonText: 'Ok',
                            })
            },
            error:function(error){
                console.log(error)
                alert("Data Gagal Diganti");
            }
        });
    });



//Hapus Jabatan
       $('table').on('click','.hapusbtn',function(){
                var getLink = $(this).attr('href');
                swal.fire({
                        title: 'Hapus Jabtan',
                        text: 'Yakim Ingin Hapus Data Jabatan',
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