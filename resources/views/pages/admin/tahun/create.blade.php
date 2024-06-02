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
  {{-- 
    <div class="alert alert-warning mt-2" role="alert">
        <i class="fas fa-fw fa-home"></i>
        <a href="{{ur{{ l('golongan')" sty }}le="text-decoration:n{{ one">Edit $golong }}an->nama}} </a>
    </div> --}}
  
      <div class="card shadow mt-2">
        <div class="card-body">
  
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Data Tahun Ajaran </li>
                </ol>
              </nav>
              
              
        <form method="post" action="/tahun/store">
          @csrf
          {{-- @method('patch') --}}
  
          <div class="form-group">
                <label for="nama_tahun">Nama Tahun</label>
                <input type="text" class="form-control" name="nama_tahun" value="{{old('nama_tahun')}}">
          </div>
  
          <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control" name="keterangan" value="{{old('keterangan')}}">
          </div>
  
          <button type="submit" class="btn btn-primary ">Simpan</button>
          <a href="/tahun" type="reset" class="btn btn-danger">Batal</a>
        </form>
  
    </div>
      </div>
  {{-- <script>
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
  
    imgPreview.style.display = 'block';
  
    const ofReader = new FileReader();
    ofReader.readAsDataURL(image.files[0]);
  
    ofReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
  </script> --}}
  
  
  @endsection