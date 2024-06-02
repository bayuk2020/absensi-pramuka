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
                      <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/pembina"><i class="fa fa-arrow-left"></i> Kembali</a></li>
                  </ul>
              </td>
            </tr>
          </table>
     </div>
  {{-- 
    <div class="alert alert-warning mt-2" role="alert">
        <i class="fas fa-fw fa-home"></i>
        <a href="{{url('pembina')}}" style="text-decoration:none">Edit {{$pembina->nama}} </a>
    </div> --}}
  
      <div class="card shadow mt-2">
        <div class="card-body">
  
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Data Pribadi </li>
                </ol>
              </nav>
              
              
        <form method="post" action="/pembina/store" enctype="multipart/form-data">
          @csrf
          {{-- @method('patch') --}}
  
          <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{old('nama')}}">
          </div>
  
          <div class="form-group">
              <label for="tempat_lahir">Tempat Lahir</label>
              <input type="text" class="form-control" name="tempat_lahir" value="{{old('tempat_lahir')}}">
          </div>
  
          <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="date" class="form-control" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
          </div>
  
          <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <select class="custom-select my-1 mr-sm-2" id="jenis_kelamin" name="jenis_kelamin" value="{{old('jenis_kelamin')}}">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Laninya">Laninya</option>
              </select>
          </div>
    
          <div class="form-group">
              <label for="agama">Agama</label>
              <select class="custom-select my-1 mr-sm-2" id="agama" name="agama" value="{{old('agama')}}">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Protestan">Protestan</option>
                <option value="Protestan">Lainnya</option>
              </select>
          </div>
    
          <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" id="message-text" name="alamat" value="{{old('alamat')}}"></textarea>
          </div>
  
          <div class="form-group">
              <label for="no_tlp">No Tlp</label>
              <input type="text" class="form-control" name="no_tlp" value="{{old('no_tlp')}}">
            </div>
    
            <div class="form-group">
              <label for="golongan">Golongan</label>
              <select class="custom-select my-1 mr-sm-2" name="id_golongan" value="{{old('id_golongan')}}">
                <option value="">Pilih Golongan</option>
                @foreach ($list_golongan as $key => $value)
                <option value="{{ $key }}">
                  {{ $value }}
                </option>
                  @endforeach
              </select>
             
            </div>
  
    </div>
  
    </div>
    
    <div class="card shadow mt-2">
        <div class="card-body">
  
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Data Akun</li>
                </ol>
              </nav>
              
  
          <div class="form-group">
              <label for="nta">NTA</label>
              <input type="text" class="form-control" name="nta" value="{{old('nta')}}">
          </div>
  
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="{{old('username')}}">
          </div>
  
          <div class="form-group">
            <label for="foto">Foto</label>
          
            <div class="custom-file">
              <input type="hidden" name="oldImage"value="{{old('foto')}}">
              <input type="file" id="image" name="foto" class="custom-file-input" id="validatedCustomFile" required>
              <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
              <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
          </div>
  
          <button type="submit" class="btn btn-primary ">Ubah</button>
          <a href="/pembina" type="reset" class="btn btn-danger">Batal</a>
        </form>
      </div>
  
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