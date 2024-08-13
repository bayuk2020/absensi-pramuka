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

      <form action="/siswa/store" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('patch') --}}

        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" name="nama"  value="{{old('nama')}}">
        </div>

        <div class="form-group">
          <label for="kelas">Kelas</label>
          <select class="custom-select my-1 mr-sm-2" id="kelas" name="kelas">
            <option selected>Pilih...</option>
            <option value="VII - A">VII - A</option>
            <option value="VII - B">VII - B</option>
            <option value="VII - C">VII - C</option>
            <option value="VII - D">VII - D</option>
            <option value="VII - E">VII - E</option>
            <option value="VII - F">VII - F</option>
            <option value="VIII - A">VIII - A</option>
            <option value="VIII - B">VIII - B</option>
            <option value="VIII - C">VIII - C</option>
            <option value="VIII - D">VIII - D</option>
            <option value="VIII - E">VIII - E</option>
            <option value="VIII - F">VIII - F</option>
            <option value="IX - A">IX - A</option>
            <option value="IX - B">IX - B</option>
            <option value="IX - C">IX - C</option>
            <option value="IX - D">IX - D</option>
            <option value="IX - E">IX - E</option>
            <option value="IX - F">IX - F</option>
          </select>
        </div>

        

        <div class="form-group">
          <label for="tempat_lahir">Tempat Lahir</label>
          <input type="text" class="form-control" name="tempat_lahir"  value="{{old('tempat_lahir')}}">
        </div>

        <div class="form-group">
          <label for="tanggal_lahir">Tanggal Lahir</label>
          <input type="date" class="form-control" name="tanggal_lahir"  value="{{old('tanggal_lahir')}}">
        </div>

        <div class="form-group">
          <label for="jenis_kelamin">Jenis Kelamin</label>
          <select class="custom-select my-1 mr-sm-2" id="jenis_kelamin" name="jenis_kelamin">
            <option selected>Pilih...</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>

        <div class="form-group">
          <label for="agama">Agama</label>
          <select class="custom-select my-1 mr-sm-2" id="agama" name="agama">
            <option selected>Pilih...</option>
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katholik">Katholik</option>
            <option value="Hindu">Hindu</option>
            <option value="Budha">Budha</option>
            <option value="Protestan">Protestan</option>
          </select>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea class="form-control" id="message-text" name="alamat"></textarea>
        </div>

        <div class="form-group">
          <label for="no_tlp">No Tlp</label>
          <input type="text" class="form-control" name="no_tlp"  value="{{old('no_tlp')}}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email"  value="{{old('email')}}">
          </div>

        <div class="form-group">
          <label for="id_golongan">Golongan</label>
          <select class="custom-select my-1 mr-sm-2" id="id_golongan" name="id_golongan">
            <option selected>Pilih...</option>
            @foreach ($list_golongan as $key => $value)
            <option value="{{ $key }}">
              {{ $value }}
            </option>
            @endforeach
            <!-- <option value="Penggalang Ramu">Pembina</option>
            <option value="Penggalang Rakit">Pembantu Pembina</option> -->
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
                <input type="text" class="form-control" name="username"  value="{{old('username')}}">
              </div>

            <div class="form-group">
                <label for="nta">NTA</label>
                <input type="text" class="form-control" name="nta"  value="{{old('nta')}}">
              </div>

              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password"  value="{{old('password')}}">
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


        <button type="submit" class="btn btn-primary ">Simpan</button>
        <button href="/pembina" type="reset" class="btn btn-danger ">Batal</button>
      </form>
    </div>

  </div>


</div>



@endsection