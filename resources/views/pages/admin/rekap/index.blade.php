@extends('layouts.admin')

@section('content')


<div class="container-fluid">

    <div class="alert alert-warning" role="alert">
        <i class="fas fa-fw fa-home"></i>
        <a href="{{url('rekap')}}" style="text-decoration:none">Rekap Presensi</a>
    </div>

    <div class="card shadow mt-2">
        <div class="card-body">

            <div class="card-body">
                <ul class="nav">
                        <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/rekap/cetakp_pdf" target="_blank"><i class="fa fa-print"></i> Cetak</a> </li>
                    {{-- <li class="scroll-to-section p-1"><a class="btn btn-warning btn-sm" href="/rekap/export_excel" target="_blank"> <i class="fas fa-fw fa-file-import"></i> Cetak</a></li> --}}
                </ul><br>
                <div>
                    <table class="table tdable-bordered table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tanggal Absen</th>
                                <th>Jam Absen</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        <tbody>
                            @foreach ($rekap as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->tanggal_absen }}</td>
                                <td>{{ $item->j_masuk }}</td> 
                                <td>{{ $item->ket }}</td>
                                
                                <td style="width: 135px;">
                                    <a class="btn btn-info" href="{{url('rekap/'.$item->id.'/show')}}"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>

</div>



@endsection