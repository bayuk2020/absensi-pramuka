<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <style type="text/css">
  
    p {color:black; size: 12px; text-align: center; }

    img {display: block; margin: auto; }

    #font{
      font-family: verdana, arial, sans-serif;
            font-size: 11px;
    }

      #table {
            color: #333333;
            border-width: 1px;
            border-color: #FFA800;
            border-collapse: collapse;
        }
        #table th {
            border-width: 1px;
            padding: 4px;
            border-style: solid;
            border-color: black;
            background-color: grey;
            color: #ffffff;
        }
        #table tr:hover td {
            cursor: pointer;
        }
        
        #table td {
            border-width: 1px;
            padding: 4px;
            border-style: solid;
            border-color: black;
            background-color: #ffffff;
        }
    
    /* #table td {
      border-width: 1px;
      padding: 4px;
      border-style: solid;
      border-color: black;
      background-color: #ffffff;
  } */

  </style>



</head>
<body>
  
<table border="0" width="100%">
  <tr>
    {{-- <td width="25%"><img src="tunas.png" alt="" width="40px"></td> --}}
    <td>
      <p id="font"><b>GERAKAN PRAMUKA
        <br>GUGUS DEPAN 13.095 - 13.096
        <br>SMP NEGERI 43 SEMARANG</b>
        <br>Jalan Jempono Rt 01 Rw 01 Kel. Bangetayu Kulon, Kec. Genuk, Kota Semarang
        <br> Email: pramuka43@gmail.com Telp. 08xxxxxxx</p>
    </td>
    {{-- <td width="25%"><img src="wosm.png" alt="" width="75px"></td> --}}
  </tr>
 </table>

 <hr>

 <p id="font"><b>DAFTAR GOLONGAN</p></b> 
 <ul>
   
   <ol type="none">
    <?php $i=1 ?>
    <table border="0" id="font table th table tr:hover td table td " class="table-bordered" width="100%" height="10%">
        
      <tr>
            <th>No</th>
            <th>Golongan</th>
            <th>Keterangan</th>
        </tr>
        @foreach ($rekap as $item)
        <tr>
            <td align="center">{{ $i++ }}</td>
            <td>{{ $item->nama_golongan }}</td>
            <td>{{ $item->keterangan }}</td>
            
        </tr>
        @endforeach
    </table>
   </ol>
  
    <br>
    <br>
      <table border="0" id="font" width="100%">
        <tr>
          <td width="10%"></td>
          {{-- <td width="45%"></td>
          <td width="15%"></td>
          <td></td> --}}
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>Semarang, <?php echo date('d F Y'); ?></td>
        </tr>
        <tr>
          <td></td>
          <td>
            Mengetahui <br>
            Kamabigus SMPN 43 Semarang
            <br>
            <br>
            <br>
            <br>
            Supanggih, S.Pd., M.M
            <br>
            Nta. 1133130960500003
        </td>
        <td></td>
        <td>
            <br>
            Pembina Pramuka
            <br>
            <br>
            <br>
            <br>
            Angsori, S.Pd
            <br>
            Nta. 1133130960500003
        </td>
        </tr>
      </table>
    </ol>
 </ul>
 </body>
</html>