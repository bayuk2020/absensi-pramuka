@extends('layouts.admin')



@section('content')



 <div class="container-fluid">

 {{-- <div class="alert alert-warning" role="alert">
 <i class="fas fa-fw fa-home"></i>
 <a  href="{{url('user01')}}" style="text-decoration:none"> Tambah Admin </a>
</div> --}}

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

    <form action="/user01/store" method="post" enctype="multipart/form-data">
    {{-- {{ crsf_field() }} --}}
      @csrf
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama"  value="{{old('nama')}}"> 
      </div>

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username"  value="{{old('username')}}"> 
      </div>

      {{-- <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email"  value="{{old('email')}}"> 
      </div> --}}

      <div class="form-group">
        <label for="nta">Nta</label>
        <input type="text" class="form-control" name="nta"  value="{{old('nta')}}"> 
      </div>
      
      <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" name="password"  value="{{old('password')}}"> 
      </div>

      <div class="form-group">
        <label for="golongan">Roles</label>
        <select class="custom-select my-1 mr-sm-2" id="golongan" name="golongan">
            <option selected>Pilih...</option>
            <option value="Admin">ADMIN</option>
        </select>
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
      <button type="reset" class="btn btn-danger ">Batal</button>
    </form>
  </div>

</div>


</div>



@endsection