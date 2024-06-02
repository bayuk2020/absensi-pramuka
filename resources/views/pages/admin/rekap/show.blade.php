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

       <div class="card shadow mt-5">
         <div class="card-body">
          

<div class="text-center">
<p><h4><b>Daftar Riwayat Absen</b></h4></p>
<p>Semester Ganjil Tahun 2022</p>
</div>
{{-- @dd($rekap) --}}
          <table border="0" width="100%">
            <tr>
              <td width="83%"></td>
              <td>
                <ul class="nav">
                  {{-- <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/rekap/{{ $rekap[0]->id }}/cetak_pdf" target="_blank"><i class="fa fa-save"></i> Simpan</a> </li>
                  <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/rekap/{{ $rekap[0]->id }}/print_pdf" target="_blank"><i class="fa fa-print"></i> Cetak</a> </li> --}}
              </ul>
              </td>
            </tr>
          </table>
          
         <br>
          
         
          <?php $i=1 ?>
          @foreach ($rekap as $item)
          {{-- @dd($rekap) --}}

          <?php 
          
          $items = DB::table('presensi')
            ->join('users', 'users.id', '=', 'presensi.id_user')
            ->select('presensi.*', 'users.nama', 'users.kelas', 'users.nta', 'users.foto')
            ->where('presensi.id',$item->id)
            ->get();
          // dd($items);
          
          ?>

          <table class="table" border="0">
            <tbody>
              <tr>
                <td width="20%">Nama</td>
                <td>{{$items[0]->nama}}</td>
              </tr>
              <tr>
                <td width="20%">Kelas</td>
                <td>{{$items[0]->kelas}}</td>
              </tr>
              <tr>
                <td width="20%">NTA</td>
                <td>{{$items[0]->nta}}</td>
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
          @endforeach
         </div>
       </div>

    </div>

@endsection