@extends('layouts.templates')

@section('title','Kelola Admin')

@section('kelolaadmin')
<div class="container mt-3">
  <h2>Daftar Admin</h2>       
  <table class="table table-striped">
    <thead class="text-center">
      <tr>
        <th>Nama</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody class="text-center">
      @foreach ($admins as $admin)
        <tr>
          <td>
              {{ $admin->name }}
          </td>
          <td>
              {{ $admin->email }}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  
    <a href="/admin/addadmin"><button type="button" class="btn btn-primary"> Tambah</button></a>
 
</div>
@endsection