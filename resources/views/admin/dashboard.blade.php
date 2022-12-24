@extends('layouts.templates')

@section('title','Halaman Dashboard Admin')

@section('dashboard')

<div class="container mt-3">
  <h2>Daftar Aspirasi Warga Konoha</h2>
  <form action="/admin/dashboard" class="w-fit mx-auto mb-10">
    <div class="input-group mb-3">
      <div class="input-group-text">
        <span>Hanya tampilkan yang belum dibaca</span>
        <input type="checkbox" name="is_read" value="1">
      </div>
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">Button</button>
      </div>
    </div>
  </form>
  <table class="table table-striped">
    <thead class="text-center">
      <tr>
        <th>Nama Lengkap</th>
        <th>NIK</th>
        <th>Cerita Aspirasi</th>
        <th>Foto Aspirasi</th>
        <th>Status</th>
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
            {{ $aspiration['is_read'] ? 'Sudah dibaca' : 'Belum dibaca'; }}
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