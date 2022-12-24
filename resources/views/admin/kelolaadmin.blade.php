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
        <th>Action</th>

      </tr>
    </thead>
    <tbody class="text-center">
      {{-- @foreach ($aspirations as $aspiration) --}}
        <tr>
          <td>
              {{-- {{ $aspiration['aspirator'] }} --}}
          </td>
          <td>
              {{-- {{ $aspiration['nik'] }} --}}
          </td>
          <td>
            <button type="button" class="btn btn-success">
                {{-- <a href="/admin/detail/{{ $aspiration['id'] }}">Details</a> --}}
              </button>
          </td>
        </tr>
      {{-- @endforeach --}}
    </tbody>
  </table>
  
    <a href="/admin/addadmin"><button type="button" class="btn btn-primary"> Tambah</button></a>
 
</div>
@endsection