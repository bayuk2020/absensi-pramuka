@extends('layouts.admin')



@section('content')

<div class="container-fluid">

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li> {{ $error }} </li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="mt-2">
      <table border="0" width="100%">
          <tr>
            <td width="90%"></td>
            <td>
                <ul class="nav">
                    <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/golongan"><i class="fa fa-arrow-left"></i> Kembali</a></li>
                </ul>
            </td>
          </tr>
        </table>
   </div>

    <div class="card shadow mt-2">
      <div class="card-body">

          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Data Golongan </li>
              </ol>
            </nav>
            
            
      <form method="post" action="/golongan/{{ $golongan->id }}/update" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="form-group">
              <label for="id_golongan">Id Golongan</label>
              <input type="text" class="form-control" name="id_golongan" value="{{$golongan->id_golongan}}">
        </div>

        <div class="form-group">
            <label for="nama_golongan">Nama Golongan</label>
            <input type="text" class="form-control" name="nama_golongan" value="{{$golongan->nama_golongan}}">
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" value="{{$golongan->keterangan}}">
        </div>

        <button type="submit" class="btn btn-primary ">Ubah</button>
        <a href="/golongan" type="reset" class="btn btn-danger">Batal</a>
      </form>
  </div>

  </div>


</div>



@endsection