@extends('layouts.templates')

@section('title','Halaman Form Inspirasi')

@section('aspirasi')

<h3>Form Pengisian Aspirasi</h3>
<form action="" method="post" enctype="multipart/form-data">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  @csrf
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="form6Example1" > Masukan Nama Lengkap</label>
        <input type="text" id="form6Example1" class="form-control" name="aspirator" required/>      
      </div>
    </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form6Example3" > Masukan NIK :</label>
    <input type="number" id="form6Example3" class="form-control" name="nik"required/>
  </div>

  
    <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form6Example5">Masukan Cerita</label>
    <textarea class="form-control" id="form6Example7" rows="4" name="story"></textarea>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form6Example4">Pilih Foto</label>
    <input type="file" id="form6Example4" class="form-control" />
  </div>

 
  <!-- Submit button -->
  <div>
     <button type="button" class="btn btn-primary">Kirim</button>
  </div>
 

</form>
@endsection