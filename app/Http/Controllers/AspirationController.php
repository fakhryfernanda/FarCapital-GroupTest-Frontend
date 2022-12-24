<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AspirationController extends Controller
{
    public function dashboard(Request $request)
    {
        // memeriksa apakah ada filter
        if ($request->filtercontent == 'dibaca') {
            $aspirations = Http::get(
                "http://127.0.0.1:8000/api/aspiration/status/dibaca"
            )->json("data");
        } elseif ($request->filtercontent == 'belum') {
            $aspirations = Http::get(
                "http://127.0.0.1:8000/api/aspiration/status/belum"
            )->json("data");
        } else {
            // tidak ada filter atau digunakan reset filter
            $aspirations = Http::get(
                "http://127.0.0.1:8000/api/aspiration"
            )->json("data");
        }


        return view('admin/dashboard', [
            "aspirations" => $aspirations
        ]);
    }

    public function detail($id)
    {
        $aspiration = Http::get(
            "http://127.0.0.1:8000/api/aspiration/detail/{$id}"
        )->json("data");
        
        // hanya mengambil tanggal dari timestamp
        $date = substr($aspiration['created_at'], 0, 10);
        // mengubah format tanggal
        $aspiration['created_at'] = date('j F Y', strtotime($date));

        return view('admin/detail', [
            "aspiration" => $aspiration
        ]);
    }

    public function add()
    {
        return view('user/add');
    }

    public function store(Request $request)
    {
        $payload = $request->all();

        // mengambil path dari foto
        $path = $request->file('photo')->getPathName();
        // mengambil nama file dari foto
        $fileName = $request->file('photo')->getClientOriginalName();

        // memasukkan gambar ke dalam response kemudian post
        $response = Http::asMultipart()->attach(
            'photo',
            file_get_contents($path),
            $fileName
        )->post(
            'http://127.0.0.1:8000/api/aspiration/add',
            $payload
        )->json();


        return redirect('admin/dashboard');
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();

        Http::post(
            'http://127.0.0.1:8000/api/aspiration/update/' . $id,
            $payload
        )->json();

        return redirect()->route('aspiration.detail', $id);
    }
}
