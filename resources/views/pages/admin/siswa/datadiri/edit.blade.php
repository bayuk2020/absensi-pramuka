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
                    <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/siswa"><i class="fa fa-arrow-left"></i> Kembali</a></li>
                </ul>
            </td>
          </tr>
        </table>
   </div>

   <div class="card shadow mt-2">
      <div class="card-body">

          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Data Pribadi </li>
              </ol>
            </nav>

            <form method="post" action="/siswa/{{ $siswa->id }}/update" enctype="multipart/form-data">
              @csrf
              @method('patch')
              
      
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{$siswa->nama}}">
              </div>
      
              
      
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="{{$siswa->email}}">
              </div>
      
              <div class="form-group">
                <label for="kelas">Kelas</label>
                <select class="custom-select my-1 mr-sm-2" id="kelas" name="kelas" value="{{$siswa->kelas}}">
                  <option value="VII - A">VII - A</option>
                  <option value="VII - B">VII - B</option>
                  <option value="VII - C">VII - C</option>
                  <option value="VII - D">VII - D</option>
                  <option value="VII - E">VII - E</option>
                  <option value="VII - F">VII - F</option>
                  <option value="VII - G">VII - G</option>
                  <option value="VII - H">VII - H</option>
                  <option value="VIII - A">VIII - A</option>
                  <option value="VIII - B">VIII - B</option>
                  <option value="VIII - C">VIII - C</option>
                  <option value="VIII - D">VIII - D</option>
                  <option value="VIII - E">VIII - E</option>
                  <option value="VIII - F">VIII - F</option>
                  <option value="VIII - G">VIII - G</option>
                  <option value="VIII - H">VIII - H</option>
                  <option value="IX - A">IX - A</option>
                  <option value="IX - B">IX - B</option>
                  <option value="IX - C">IX - C</option>
                  <option value="IX - D">IX - D</option>
                  <option value="IX - E">IX - E</option>
                  <option value="IX - F">IX - F</option>
                  <option value="IX - G">IX - G</option>
                  <option value="IX - E">IX - E</option>
                  <option value="IX - F">IX - F</option>
                  <option value="IX - G">IX - G</option>
                  <option value="PEMBINA">PEMBINA</option>
                  <option value="Laninya">Laninya</option>
                </select>
              </div>
      
              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" value="{{$siswa->tempat_lahir}}">
              </div>
      
              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" value="{{$siswa->tanggal_lahir}}">
              </div>
      
              <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="custom-select my-1 mr-sm-2" id="jenis_kelamin" name="jenis_kelamin" value="{{$siswa->jenis_kelamin}}">
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                  <option value="Laninya">Laninya</option>
                </select>
              </div>
      
              <div class="form-group">
                <label for="agama">Agama</label>
                <select class="custom-select my-1 mr-sm-2" id="agama" name="agama" value="{{$siswa->agama}}">
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
                <textarea class="form-control" id="message-text" name="alamat">{{$siswa->alamat}}</textarea>
              </div>
      
              <div class="form-group">
                <label for="no_tlp">No Tlp</label>
                <input type="text" class="form-control" name="no_tlp" value="{{$siswa->no_tlp}}">
              </div>
      
              <div class="form-group">
                <label for="golongan">Golongan</label>
                <select class="custom-select my-1 mr-sm-2" name="id_golongan">
                  <option value="">Pilih Golongan</option>
                  @foreach ($list_golongan as $key => $value)
                  <option value="{{ $key }}" {{$item->id_golongan == $key ? 'selected' : ''}}>
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
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="{{$siswa->username}}">
              </div>

              <div class="form-group">
                  <label for="nta">NTA</label>
                  <input type="text" class="form-control" name="nta" value="{{$siswa->nta}}">
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password"  value="{{old('password')}}">
                </div>

                <div class="form-group">
                    <label for="foto">Foto</label>
                    @if($item->foto)
                      <img src="{{ asset('foto_siswa/'.$siswa->foto) }}" class="img-preview img-fluid d-block mb-3 col-sm-5" alt="" style="width:20%;height:auto">
                      @else
                      <img class="img-preview img-fluid d-block mb-3 col-sm-5">
                    @endif
                    <div class="custom-file">
                      <input type="hidden" name="oldImage" value="{{ $siswa->foto }}">
                      <input type="file" id="image" name="foto" class="custom-file-input" id="validatedCustomFile"  onchange="previewImage()">
                      <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                      <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary ">Ubah</button>
                  <a href="../" class="btn btn-danger ">Batal</a>
                </form>

      </div>
   </div>



</div>

<script>
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
    </script>

@endsection