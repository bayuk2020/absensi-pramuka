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
                    <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/siswa"><i class="fa fa-arrow-left"></i> Kembali</a></li>
                    <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/siswa/{{ $siswa->id }}/cetak_pdf" target="_blank"><i class="fa fa-save"></i> Simpan</a> </li>
                    <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/siswa/{{ $siswa->id }}/print_pdf" target="_blank"><i class="fa fa-print"></i> Cetak</a> </li>
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
                <td>Nama</td>
                <td>{{$siswa->nama}}</td>
              </tr>
              
              <tr>
                <td>Kelas</td>
                <td>{{$siswa->kelas}}</td>
              </tr>
              
              <tr>
                <td>Tempat Lahir</td>
                <td>{{$siswa->tempat_lahir}}</td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td>{{$siswa->tanggal_lahir}}</td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>{{$siswa->jenis_kelamin}}</td>
              </tr>
              <tr>
                <td>Agama</td>
                <td>{{$siswa->agama}}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>{{$siswa->alamat}}</td>
              </tr>
              <tr>
                <td>No Telp</td>
                <td>{{$siswa->no_tlp}}</td>
              </tr>
              <tr>
                  <td>Email</td>
                  <td>{{$siswa->email}}</td>
                </tr>
              <tr>
                <td>Golongan</td>
                <td>{{$siswa->golongan->nama_golongan}}</td>
              </tr>
              
          </table>
         </div>
       </div>

       <div class="card shadow mt-2">
          <div class="card-body">
           
           <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                 <li class="breadcrumb-item">Data Akun</li>
               </ol>
             </nav>

             <table class="table" border="0">
                <tr>
                    <td>Username</td>
                    <td>{{$siswa->username}}</td>
                  </tr>

             <tr>
                <td width="20%">NTA</td>
                <td>{{$siswa->nta}}</td>
              </tr>

              <tr>
                  <td>Foto</td>
                  <td>
                      @if($siswa->foto)
                      <img src="{{ asset('foto_siswa/'.$siswa->foto) }}" class="img-preview img-fluid d-block mb-3 col-sm-5" alt="" style="width:20%;height:auto">
                      @else
                      <img class="img-preview img-fluid d-block mb-3 col-sm-5">
                    @endif
                  </td>
              </tr>
              
             </table>

             <a href="{{url('siswa/'.$siswa->id.'/edit')}}" type="submit" class="btn btn-primary ">Edit</a>
             <a href="/siswa" type="reset" class="btn btn-danger ">Batal</a>

          </div>
       </div>

    </div>

@endsection