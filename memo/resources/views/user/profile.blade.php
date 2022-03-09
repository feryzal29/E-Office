@extends('layouts.admin')
@section('title', 'Profile')
@section('body')


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Profile</h1>
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <a class="btn btn-danger" href="/list-user">Kembali</a>
        </div> --}}
        <div class="card-body">
             <!-- form start -->
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">NIP</th>
                        <td>{{auth()->user()->nip}}</td>    
                    </tr>
                    <tr>
                        <th scope="row">Nama</th>
                        <td>{{auth()->user()->Nama}}</td>  
                    </tr>
                    <tr>
                        <th scope="row">Jabatan</th>
                        @foreach ($getprofile as $profile )
                            <td>{{$profile->jabatan}}</td>
                        @endforeach
                    </tr>
                    
                </tbody>
            </table>
              
        </div>
    </div>
</div>



@endsection
@push('after-script')
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

@endpush