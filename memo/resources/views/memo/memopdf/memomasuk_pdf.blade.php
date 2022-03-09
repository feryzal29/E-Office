<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
    <style>
        .title{
             text-align:center;
              font-size:15px;
             
        }
        .title2{
            margin-top:0px;
            text-align:center;

        }
        .perihal{
            border: 1px solid #000;
            padding: 5px;
           
        }
        .ttd_name{
            text-align:right;
        }
        .kiri{
            text-align:left;
        }
        body{
            font-size:14px;
        }
    </style>
</head>
<body>
	<table style="width:100%">
        <tr>
            <td class="title" colspan="6"><strong>MEMO INTERNAL</strong></td>        
        </tr>
        <tr>
            <td class="title"colspan="6"><strong>RS PKU MUHAMMADIYAH SEKAPUK</strong></td>        
        </tr>
        <tr>
            <td colspan="6"> <hr></td>
        </tr>
         @foreach ($konfir1 as $value) 
        <tr>
            <td>Nomor</td>
            <td>:</td>
            <td >{{$value->no_surat}}</td>
            <td class="ttd_name">Dari</td>
            <td>:</td>
            <td>{{$value->Nama}}</td>
        </tr>
      
        <tr>
            <td>Kepada Yth</td>
            <td>:</td>
            <td>{{$value->kepada}}</td>
        @endforeach
            <td class="ttd_name">Bagian</td>
            <td>:</td>
        @foreach ($konfir2 as $value2)
             <td>{{$value2->jabatan}}</td>
        @endforeach
           
        </tr>
        @foreach ($konfir1 as $value) 
        <tr>
            <td></td>
            <td></td>
            <td>RS PKU Muhammadiyah Sekapuk</td>
            <td class="ttd_name">Tanggal</td>
            <td>:</td>
            
            <td>{{ date("d F Y", strtotime($value->tgl_surat)) }} </td>
            
        </tr>
       
        <tr>
            <td>CC</td>
            <td>:</td>
            <td colspan="3">{{$value->cc}}</td> 
        </tr>
        <tr>
            <td colspan="6" style="height:10px"></td>
            
        </tr>
        <tr>
            <td  colspan="6" class="perihal" >Perihal : {{$value->perihal}}</td>
        </tr>
        
        <tr>
            <td  colspan="6" class="isi">{!!$value->isi!!}</td>
        </tr>
        @endforeach
        <tr >
         @foreach ($konfir2 as $value2)
            <td  colspan="6" style="height:2%" class="ttd_name">{{$value2->jabatan}}</td>
        @endforeach
            
        </tr>
        <tr >
         @foreach ($konfir1 as $value) 
            <td  colspan="6" style="height:1%" class="ttd_name"><img src="{{public_path('image/qrcode/'.$value->qr_code)}}"></td>
            @endforeach
        </tr>
        <tr >
         @foreach ($konfir1 as $value) 
            <td  colspan="6" style="height:1%" class="ttd_name">{{$value->Nama}}</td>
            @endforeach
        </tr>
        <tr>
            <td  colspan="6"><hr></td>
        </tr>
        <tr>
            <td  colspan="6">Disposisi</td>
        </tr>
        
    </table>
    
	

</body>
</html>