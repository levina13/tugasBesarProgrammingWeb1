<?php

namespace App\Http\Controllers;

use App\Models\objek_wisata;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function index()
    {
        $wisatas = objek_wisata::select('objek_wisatas.*', 'kecamatans.kecamatan as nama_kecamatan', 'jenis_wisatas.jenis as nama_kategori', 'gambar_objeks.gambar as gambar')
        ->join('kecamatans', 'objek_wisatas.kecamatan', '=', 'kecamatans.id_kecamatan')
        ->join('jenis_wisatas', 'objek_wisatas.jenis_wisata', '=', 'jenis_wisatas.id_jenis_wisata')
        ->join('gambar_objeks', 'objek_wisatas.id_gambar', '=', 'gambar_objeks.id_gambar_objek')
        ->orderBy('objek_wisatas.created_at', 'DESC')->take(4)->get();
        return view('index', ['wisatas' => $wisatas]);
    }
}
