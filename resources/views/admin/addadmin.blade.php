@extends('layouts.templates')

@section('title','Tambah admin')

@section('addadmin')

<div class="mt-3">
  <h3>Form Tambah Admin</h3>
</div>
<form action="{{ route('admin.add') }}" method="post" enctype="multipart/form-data">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  @csrf
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="form6Example1" > Masukan Nama</label>
        <input type="text" id="form6Example" class="form-control" name="name" required/>
      </div>
    </div>

    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="form6Example1" > Masukan Email</label>
        <input type="email" id="form6Example1" class="form-control" name="email" required/>      
      </div>
    </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form6Example3" > Password :</label>
    <input type="password" id="form6Example3" class="form-control" name="password"required/>
  </div>

  
    <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form6Example5">Verifikasi Password</label>
    <input type="password" id="form6Example3" class="form-control" name="password"required/>
  </div>

  <!-- Submit button -->
  <div>
     <button type="submit" class="btn btn-primary">Kirim</button>
  </div>
 

</form>
    
@endsection