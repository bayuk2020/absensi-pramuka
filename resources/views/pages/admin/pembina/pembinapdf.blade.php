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

  </style>

</head>
<body>
  
<table border="0" width="100%">
  <tr>
    {{-- <td width="25%"><img src="tunas.png" alt="" width="40px"></td> --}}
    <td>
      <p><b>GERAKAN PRAMUKA
        <br>GUGUS DEPAN 13.095 - 13.096
        <br>SMP NEGERI 43 SEMARANG</b>
        <br>Jalan Jempono Rt 01 Rw 01 Kel. Bangetayu Kulon, Kec. Genuk, Kota Semarang
        <br> Email: pramuka43@gmail.com Telp. 08xxxxxxx</p>
    </td>
    {{-- <td width="25%"><img src="wosm.png" alt="" width="75px"></td> --}}
  </tr>
 </table>

 <hr>

 <p><b>DAFTAR PEMBINA</p></b> 
 <ul>
   <ol type="A">Data Pribadi</ol>
   <ol type="none">
    <?php $i=1 ?>
    <table border="0" width="100%">
      @foreach ($pembina as $pembina)
      <tr>
        <td width="5%">{{$i++}}</td>
        <td width="25%">NTA</td>
        <td width="5%">:</td>
        <td width="65%">{{$pembina->nta}}</td>
      </tr>
      <tr>
        <td>{{$i++}}</td>
        <td>Nama</td>
        <td>:</td>
        <td>{{$pembina->nama}}</td>
      </tr>
     
      <tr>
        <td>{{$i++}}</td>
        <td>Tempat Lahir</td>
        <td>:</td>
        <td>{{$pembina->tempat_lahir}}</td>
      </tr>
      <tr>
        <td>{{$i++}}</td>
        <td>Tanggal Lahir</td>
        <td>:</td>
        <td>{{$pembina->tanggal_lahir}}</td>
      </tr>
      <tr>
        <td>{{$i++}}</td>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{$pembina->jenis_kelamin}}</td>
      </tr>
      <tr>
        <td>{{$i++}}</td>
        <td>Agama</td>
        <td>:</td>
        <td>{{$pembina->agama}}</td>
      </tr>
      <tr>
        <td>{{$i++}}</td>
        <td>Alamat Lengkap</td>
        <td>:</td>
        <td>{{$pembina->alamat}}</td>
      </tr>
      <tr>
        <td>{{$i++}}</td>
        <td>No Telp</td>
        <td>:</td>
        <td>{{$pembina->no_tlp}}</td>
      </tr>
      <tr>
        <td>{{$i++}}</td>
        <td>Golongan</td>
        <td>:</td>
        <td>{{$pembina->golongan->nama_golongan}}</td>
      </tr>
     
     
      @endforeach
    </table>
   </ol>
   
   <ol type="B">Data Akun </ol>
   <ol type="none">
    <?php $i=1 ?>
    <table border="0" width="100%">
        <tr>
            <td width="5%">{{$i++}}</td>
            <td width="25%">NTA</td>
            <td width="5%">:</td>
            <td width="65%">{{$pembina->nta}}</td>
        </tr>
 
        <tr>
            <td>{{$i++}}</td>
            <td>Username</td>
            <td>:</td>
            <td>{{$pembina->username}}</td>
          </tr>
 
          <tr>
              <td>{{$i++}}</td>
              <td>Password</td>
              <td>:</td>
              <td></td>
            </tr>
 
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
              {{$pembina->nama}}
              <br>
              Nta. {{$pembina->nta}}
          </td>
        </tr>
      </table>
    </ol>
 </ul>
 </body>
</html>