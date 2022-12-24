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
      @foreach ($aspirations as $aspiration)
        <tr>
          <td>
              {{ $aspiration['aspirator'] }}
          </td>
          <td>
              {{ $aspiration['nik'] }}
          </td>
          <td>
            {{ $aspiration['story'] }}
          </td>
          <td>
              <img src="{{ 'http://127.0.0.1:8000/storage/' . $aspiration['photo'] }}" alt="photo" width="200">
          </td>
          <td>
              {{-- <button type="button" class="btn btn-success">
                <a href="/admin/detail/{{ $aspiration['id'] }}">Details</a>
              </button> --}}
              <form action="{{ route('aspiration.update', $aspiration['id']) }}" method="POST">
                @csrf
                <input type="hidden" name="is_read" id="is_read" value="1">
                <button type="submit" class="btn btn-success">Detail</button>
              </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection