
<!DOCTYPE html>
<html lang="en">

<head>
<title>Login</title>

     @include('partial.admin.head')
    
     

</head>

<body class="bg-gradient-primary">
 @include('sweetalert::alert')
    <div class="container">

      <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                               <img class="logo mb-4" src="image/setting/{{$login->logo}}" style="width: 27%" >
                            </div>
                            <div class="text-center">
                                <h1 class="h4 text-gray mb-2">E-Office</h1>
                            </div>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">{{$login->nama_instansi}}</h1>    
                            </div>
                            <form class="user" method="post" action="/authentication">
                               @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control"   placeholder="Username" name="username" >
                                    @error('username')
                                     <small style="color:red">- {{ $message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" >
                                    @error('password')
                                     <small style="color:red">- {{ $message}}</small>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                            </form>
                           

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
                

            

    </div>

    @include('partial.admin.js')

</body>

</html>
