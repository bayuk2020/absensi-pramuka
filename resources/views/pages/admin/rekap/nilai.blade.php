@extends('layouts.admin')

@section('content')


<div class="container-fluid">

    <div class="alert alert-warning" role="alert">
        <i class="fas fa-fw fa-home"></i>
        <a href="{{url('rekap')}}" style="text-decoration:none">Rekap Nilai</a>
    </div>

    <div class="card shadow mt-2">
        <div class="card-body">
            <div class="card-body">
                <ul class="nav">
                    <li class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/rekap/export_excel" target="_blank"> <i class="fas fa-fw fa-file-import"></i> Cetak</a></li>
                </ul><br>
                <div>
                    <table class="table tdable-bordered table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Hadir</th>
                                <th>Sakit</th>
                                <th>Ijin</th>
                                <th>Alpha</th>
                                <th>Nilai</th>
                            </tr>
                        <tbody>
                            {{-- ini bagiaan nilai nya --}}
                            @foreach ($id as $x)
                            <tr>
                                @php 
                                    $hadir = App\Models\Presensi::all()->where('id_user' , $x->id_user)->where('ket' , 'hadir')->count();
                                    $sakit = App\Models\Presensi::all()->where('id_user' , $x->id_user)->where('ket' , 'sakit')->count();
                                    $ijin = App\Models\Presensi::all()->where('id_user' , $x->id_user)->where('ket' , 'ijin')->count();
                                    $alpha = App\Models\Presensi::all()->where('id_user' , $x->id_user)->where('ket' , 'alpha')->count();
                                @endphp
                                {{-- <td>{{ $x->id_user }}</td> --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $x->nama }}</td>
                                <td>{{ $x->kelas }}</td>
                                <td>{{ $hadir }}</td>
                                <td>{{ $sakit }}</td>
                                <td>{{ $ijin }}</td>
                                <td>{{ $alpha }}</td>
                                <td>
                                    @foreach($kelas7 as $y)
                                        @if ($x->kelas == $y)
                                            @if ($hadir >= 6)
                                                A
                                            @elseif ($hadir >= 3)
                                                B
                                            @elseif ($hadir >= 1)
                                                C
                                            @else
                                                D
                                            @endif
                                            @break
                                        @endif
                                    @endforeach
                                    @foreach($kelas8 as $y)
                                        @if ($x->kelas == $y)
                                            @if ($hadir >= 5)
                                                A
                                            @elseif ($hadir >= 3)
                                                B
                                            @elseif ($hadir >= 1)
                                                C
                                            @else
                                                D
                                            @endif
                                            @break
                                        @endif
                                    @endforeach
                                    @foreach($kelas9 as $y)
                                        @if ($x->kelas == $y)
                                            @if ($hadir >= 4)
                                                A
                                            @elseif ($hadir >= 2)
                                                B
                                            @elseif ($hadir == 1)
                                                C
                                            @else
                                                D
                                            @endif
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                            {{-- kelar disini --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection