<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
    <style>
    .logo{
        width:50;
    }
    .title{
        text-align:left;
    }
    .diteruskan,.tr,.td{
        border: 1px solid #000;
        border-collapse: collapse;
    }                                                                         
        body{
            font-size:14px;
        }
    </style>
</head>
<body>
	<table style="width:100%">
        <tr>
            @foreach ( $setting as $item)
                 <td rowspan="3" style="width:60px"><img class="logo" src="{{public_path('image/setting/'.$item->logo)}}"></td>
            @endforeach
            <td colspan="7" class="title" style="font-size:17px;vertical-align: bottom;">RUMAH SAKIT</td>        
        </tr>
        <tr>
            <td class="title"colspan="7" style="font-size:17px;vertical-align: top;"><strong><u>PKU MUHAMMADIYAH SEKAPUK</u></strong></td>        
        </tr>
        <tr>
            <td class="title"colspan="5" style="font-size:10px;vertical-align: top;"><i>CREATIVE, ACTIVE, RESPONSIBILITY, EMPATY(CARE)</i></td>        
        </tr>
        <tr>
            <td colspan="8" style="vertical-align: top;"> <hr></td>
        </tr>
        <tr>
            <td colspan="8" style="text-align:center"><strong> <u>LEMBAR DISPOSISI</u></strong></td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:left;height:20px"></td>
            
        </tr>
        @foreach ($disposisi as $item)
        <tr>
            <td colspan="3" style="text-align:left;">Tanggal Memo</td>
            <td style="text-align:center;width:5%">:</td>
          
            <td colspan="4" style="text-align:left;">{{date("d-F-Y", strtotime($item->tgl_surat))}}</td>
            
            
        </tr>
        <tr>
            <td colspan="3" style="text-align:left">Nama Pengirim</td>
            <td style="text-align:center">:</td>
            <td colspan="4" style="text-align:left">{{$item->jabatan}}</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:left">Nomor Memo</td>
            <td style="text-align:center">:</td>
            <td colspan="4" style="text-align:left">{{$item->no_surat}}</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:left">Perihal</td>
            <td style="text-align:center">:</td>
            <td colspan="4" style="text-align:left">{{$item->perihal}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="7" style="text-align:left;height:10px"></td>
            
        </tr>
        <tr>
            <td colspan="7" style="text-align:left"><strong> PERJALANAN SURAT</strong></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:left">Disposisi dari</td>
            <td style="text-align:center">:</td>
            @foreach ($pengirim as $item)
            <td colspan="4" style="text-align:left">{{$item->jabatan}}</td>
             @endforeach
        </tr>
        @foreach ($tujuan as $item2 )
        <tr>
            <td colspan="3" style="text-align:left">Disampaikan Kepada</td>
            <td style="text-align:center">:</td>
            <td colspan="4" style="text-align:left">{{$item2->jabatan}}</td>
        </tr>
        @endforeach
        @foreach ($disposisi as $item2 )
        <tr>
            <td colspan="3" style="text-align:left">Isi Disposisi</td>
            <td style="text-align:center">:</td>
            <td colspan="4" style="text-align:left">{{$item2->isi}}</td>
        </tr>
        @endforeach
       
    </table>
    
	

</body>
</html>