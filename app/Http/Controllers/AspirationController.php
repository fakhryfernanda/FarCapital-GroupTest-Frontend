<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AspirationController extends Controller
{
    public function dashboard(Request $request)
    {
        if ($request->filtercontent == 'dibaca') {
            $aspirations = Http::get(
                "http://127.0.0.1:8000/api/aspiration/status/dibaca"
            )->json("data");
        } elseif ($request->filtercontent == 'belum') {
            $aspirations = Http::get(
                "http://127.0.0.1:8000/api/aspiration/status/belum"
            )->json("data");
        } else {
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

        $date = substr($aspiration['created_at'], 0, 10);
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

        $path = $request->file('photo')->getPathName();
        $fileName = $request->file('photo')->getClientOriginalName();

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
