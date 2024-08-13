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

       <ul class="nav">
        <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/rekap/{{ $rekap[0]->id }}/cetak_pdf" target="_blank"><i class="fa fa-save"></i> Simpan</a> </li>
        <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/rekap/{{ $rekap[0]->id }}/print_pdf" target="_blank"><i class="fa fa-print"></i> Cetak</a> </li>
    </ul>
    <div class="card shadow mt-5">
      <div class="card-body">
    <p><h4><b>Daftar Riwayat Absen</b></h4></p>
<p>Semester Ganjil Tahun 2022</p>
      </div>
    </div>

    @foreach ($items as $item)
       <div class="card shadow mt-3">
         <div class="card-body">
          
         <br>
          

          <table class="table" border="0">
            <tbody>
              <tr>
                <td width="20%">Nama</td>
                <td>{{$item->nama}}</td>
              </tr>
              <tr>
                <td width="20%">Kelas</td>
                <td>{{$item->kelas}}</td>
              </tr>
              <tr>
                <td width="20%">NTA</td>
                <td>{{$item->nta}}</td>
              </tr>
              <tr>
                <td>Tanggal Absen</td>
                <td>{{$item->tanggal_absen}}</td>
              </tr>
              <tr>
                <td>Jam Absen</td>
                <td>{{$item->j_masuk}}</td>
              </tr>
              <tr>
                <td>Status Masuk</td>
                <td>{{$item->ket}}</td>
              </tr>
              <tr>
                <td>Foto</td>
                <td><img width="300" height="auto" src="{{asset('foto_presensi/'.$item->foto)}}" alt=""></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      @endforeach

    </div>

@endsection