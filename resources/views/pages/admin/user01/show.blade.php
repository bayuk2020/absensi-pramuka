@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

       @if ($errors->any())
       <div class="alert alert-danger">
         <ul>
           @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
         </ul>
       </div>
       @endif

       <div class="mt-2">
          <table border="0" width="100%">
              <tr>
                <td width="73%"></td>
                <td>
                  <ul class="nav">
                    <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/user01"><i class="fa fa-arrow-left"></i> Kembali</a></li>
                    <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/user01/{{ $user01->id }}/cetak_pdf" target="_blank"><i class="fa fa-save"></i> Simpan</a> </li>
                    <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/user01/{{ $user01->id }}/print_pdf" target="_blank"><i class="fa fa-print"></i> Cetak</a> </li>
                </ul>
                </td>
              </tr>
            </table>
       </div>
       
       <div class="card shadow mt-2">
          <div class="card-body">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Data Pribadi</li>
              </ol>
            </nav>

            <?php $i=1 ?>
            <table class="table" border="0">
                <tr>
                  <td width="20%">No</td>
                  <td>{{$i++}}</td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td>{{$user01->nama}}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>{{$user01->tempat_lahir}}</td>
                </tr>
                  <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{$user01->tanggal_lahir}}</td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td>{{$user01->jenis_kelamin}}</td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td>{{$user01->agama}}</td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>{{$user01->alamat}}</td>
                  </tr>
                  <tr>
                    <td>No Telp</td>
                    <td>{{$user01->no_tlp}}</td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>{{$user01->email}}</td>
                    </tr>
                  <tr>
                    <td>Golongan</td>
                    <td>{{$user01->golongan->nama_golongan}}</td>
                  </tr>
        </table>

       </div>
       </div>


       <div class="card shadow mt-2">
          <div class="card-body">
          <?php $i=1 ?>
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Data Akun</li>
              </ol>
            </nav>

            <?php $i=1 ?>
            <table class="table" border="0">
                <tr>
                    <td width="20%">Username</td>
                    <td>{{$user01->username}}</td>
                  </tr>
                <tr>
                  <td>NTA</td>
                  <td>{{$user01->nta}}</td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td>
                      @if($user01->foto)
                        <img src="{{ asset('foto_admin/'.$user01->foto) }}" class="img-preview img-fluid d-block mb-3 col-sm-5" alt="" style="width:20%;height:auto">
                        @else
                        <img class="img-preview img-fluid d-block mb-3 col-sm-5">
                      @endif
                    </td>
                </tr>
        </table>

       </div>
       </div>


    </div>

@endsection