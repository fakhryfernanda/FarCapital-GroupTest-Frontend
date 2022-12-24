
<div class="justify-content-between">
<nav class="navbar navbar-expand-lg navbar-light bg-danger text-white px-3 d-flex justify-content-between">
  
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <a class="navbar-brand text-white" href="{{ route('home') }}">Forum Aspirasi </a>
    <a class="nav-item nav-link active text-white" href="{{ route('home') }}">Home</a>
    <a class="nav-item nav-link  text-white" href="/admin/dashboard">Dashboard</a>
    @auth
    <a class="nav-item nav-link  text-white" href="/admin/kelolaadmin">Kelola Admin</a>
    @else
    <a class="nav-item nav-link  text-white" href="{{ route('add.aspiration') }}">Isi Aspirasi</a>
    @endauth
  </div>
  {{-- memeriksa apakah si user sudah diautentikasi --}}
  @auth
  <form action="/logout" method="post">
    @csrf
    <button type="submit" class="btn btn-primary">Logout</button>
  </form>
  {{-- kondisi ketika si user belum ter autentikasi --}}
  @else 
  <a class="nav-item nav-link  text-white" href="{{ route('login') }}">
    <button type="button" class="btn btn-primary">Login</button>
  </a>
  @endauth
</nav>
</div>


