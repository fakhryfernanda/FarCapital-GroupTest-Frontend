@extends('layouts.templates')

@section('title','Halaman Dashboard Admin')

@section('dashboard')

<div class="container mt-3">
  <h2>Daftar Aspirasi Warga Konoha</h2>       
  <table class="table table-striped">
    <thead class="text-center">
      <tr>
        <th>Nama Lengkap</th>
        <th>NIK</th>
        <th>Cerita Aspirasi</th>
        <th>Foto Aspirasi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <tr>
        <td>
            John</td>
        <td>
            Doe</td>
        <td>
            john@example.com</td>
        <td>
            Lorem ipsum dolor sit amet.</td>
        <td>
            <button type="button" class="btn btn-success">Details</button>
            <button type="button" class="btn btn-primary">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>

@endsection