@extends('layouts.templates')

@section('title','Halaman Form Inspirasi')

@section('detail')

<h3 class="text-center py-5">Halaman Detail Aspirasi</h3>
<div class="card mx-auto" style="width: 80%">
  <img class="card-img-top" src="{{ 'http://127.0.0.1:8000/storage/' . $aspiration['photo'] }}" alt="Foto Aspirasi">
  <div class="card-body">
    <h5 class="card-title">{{ $aspiration['aspirator'] }}</h5>
    <p class="card-text">{{ $aspiration['story'] }}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{ $aspiration['created_at'] }}</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Kembali</a>
  </div>
</div>

@endsection