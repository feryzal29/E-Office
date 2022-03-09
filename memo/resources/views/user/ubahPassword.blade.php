@extends('layouts.admin')
@section('title', 'Ubah Password')
@section('body')


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ubah Password</h1>
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <a class="btn btn-danger" href="/list-user">Kembali</a>
        </div> --}}
        <div class="card-body">
            <form role="form" action="/password/update" method="post" >
              @csrf
                <div class="card-body">
                 <input type="hidden" id="cid" name="cid" value="{{auth()->user()->id_user}}">
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="psw">Password</label>
                            <input type="password" class="form-control" id="psw" placeholder="Password" name="password1" required>
                            
                            @error('psw')
                             <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                     </div>
                    </div>
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="psw">Ketik Ulang Password</label>
                            <input type="password" class="form-control" id="psw" placeholder="Ketik Ulang Password" name="password2" required>
                            
                            @error('psw')
                             <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                     </div>
                    </div>
                    
                    
                   
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger" name="simpan">Ubah</button>
                </div>
            </form>
              
        </div>
    </div>
</div>



@endsection
