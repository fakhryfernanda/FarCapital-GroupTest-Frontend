@extends('layouts.templates')

@section('title','Halaman Dashboard Admin')

@section('dashboard')

<div class="container mt-3">
  <h2>Daftar Aspirasi Warga Konoha</h2>
  <form action="/admin/dashboard" class="w-fit mx-auto mb-10">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="filtercontent" id="reset">
      <label class="form-check-label" for="filtercontent">
        Reset filter
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="filtercontent" id="dibaca" value="dibaca">
      <label class="form-check-label" for="filtercontent">
        Sudah dibaca
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="filtercontent" id="belum" value="belum">
      <label class="form-check-label" for="filtercontent">
        Belum dibaca
      </label>
    </div>
    <div class="input-group-append mt-3">
      <button class="btn btn-outline-secondary" type="submit">Filter</button>
    </div>
  </form>
  <table class="table table-striped mt-3">
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