@extends('layouts.admin')



@section('content')

 <div class="container-fluid">

 <div class="alert alert-warning" role="alert">
 <i class="fas fa-fw fa-home"></i>
 <a  href="{{url('user01')}}" style="text-decoration:none">Edit {{$user01->nama}} </a>
</div>

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
                <li  class="scroll-to-section p-1"><a class="btn btn-primary btn-sm" href="/user01"><i class="fa fa-arrow-left"></i> Kembali</a></li>
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

    <form method="post" action="/user01/{{ $user01->id }}/update" enctype="multipart/form-data">
      @csrf
      @method('patch')
      
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" value="{{$user01->nama}}"> 
      </div>
      
     

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="{{$user01->email}}"> 
      </div>

      <div class="form-group">
        <label for="roles">Roles</label>
        <select class="custom-select my-1 mr-sm-2" id="roles" name="roles">
        @if (old('roles') == $user01->roles)
            <option value="{{ $user01->roles }}" selected>{{ $user01->roles }}</option>
            @else
            <option value="ADMIN">ADMIN</option>
            <option value="USER">USER</option>
            @endif
        </select>
      </div>

      <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" name="tempat_lahir" value="{{$user01->tempat_lahir}}"> 
      </div>

      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" value="{{$user01->tanggal_lahir}}"> 
      </div>
      
      <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="custom-select my-1 mr-sm-2" id="jenis_kelamin" name="jenis_kelamin" value="{{$user01->jenis_kelamin}}">
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                          <option value="Laninya">Laninya</option>
                      </select>
      </div>

      <div class="form-group">
        <label for="agama">Agama</label>
        <select class="custom-select my-1 mr-sm-2" id="agama" name="agama" value="{{$user01->agama}}">
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
        <textarea class="form-control" id="message-text" name="alamat">{{$user01->alamat}}</textarea>
      </div>

      <div class="form-group">
        <label for="no_tlp">No Tlp</label>
        <input type="text" class="form-control" name="no_tlp" value="{{$user01->no_tlp}}"> 
      </div>

      <div class="form-group">
        <label for="id_golongan">Golongan</label>
        <select class="custom-select my-1 mr-sm-2" id="id_golongan" name="id_golongan">
                        @foreach($gol as $golongan)
                          @if (old('golongan', $user01->id_golongan ) == $golongan->id_golongan)
                              <option value="{{ $golongan->id_golongan }}" selected>{{ $golongan->nama_golongan }}</option>
                            @else
                            <option value="{{ $golongan->id_golongan }}">{{$golongan->nama_golongan}}</option>
                          @endif
                        @endforeach
                          
                      </select>
      </div>


      
  </div>

</div>

<div class="card shadow mt-2">
  <div class="card-body">

      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Data Pribadi </li>
          </ol>
        </nav>

        <div class="form-group">
          <label for="nta">NTA</label>
          <input type="text" class="form-control" name="nta" value="{{$user01->nta}}"> 
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" value="{{$user01->username}}"> 
        </div>

        <div class="form-group">
          <label for="foto">Foto</label>
        <div class="custom-file">      
          <input type="file" name="foto" class="custom-file-input" id="validatedCustomFile" required>
          <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
          <div class="invalid-feedback">Example invalid custom file feedback</div>
        </div>
        </div>
  
        <button type="submit" class="btn btn-primary ">Ubah</button>
        <button type="reset" class="btn btn-danger ">Batal</button>
      </form>

  </div>
</div>


</div>



@endsection