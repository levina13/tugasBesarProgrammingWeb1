<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\GambarObjeks;
use App\Models\JenisWisatas;
use App\Models\Kecamatans;
use App\Models\ObjekWisatas;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObjekPariwisataController extends Controller
{
    public function index(Request $request){
        return view('dashboard.pariwisatas.index');
    }

    public function create(Request $request){
        $kecamatans = Kecamatans::all();
        $kategoris      = JenisWisatas::all();

        return view('dashboard.pariwisatas.create', ['kecamatans' => $kecamatans, 'kategoris' => $kategoris]);
    }

    public function store(Request $request){
        $validator  = Validator::make($request->all(), [
            'nama'  => 'required|string',
            'alamat'    => 'required|string',
            'kecamatan' => 'required|exists:kecamatans,id_kecamatan',
            'jenis_wisata'  => 'required|exists:jenis_wisatas,id_jenis_wisata',
            'deskripsi'   => '',
            'latitude_Y'    => 'required|string',
            'longitude_X'   => 'required|string',
            'harga' => 'required|integer',
            'gambar' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect()->route('pariwisata.create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $validated  = $validator->validated();

        $filename = $validated['gambar']->hashName();
        $imagePath = $validated['gambar']->move('images/wisata/', $filename);

        try{
            $gambar         = new GambarObjeks();
            $gambar->gambar     = $imagePath;
            $gambar->keterangan = $validated['nama'];
            $gambar->save();

            ObjekWisatas::create([
                'nama'          => $validated['nama'],
                'alamat'        => $validated['alamat'],
                'kecamatan'     => $validated['kecamatan'],
                'jenis_wisata'  => $validated['jenis_wisata'],
                'deskripsi'     => $validated['deskripsi'],
                'latitude_Y'    => $validated['latitude_Y'],
                'longitude_X'   => $validated['longitude_X'],
                'harga'         => $validated['harga'],
                'id_gambar'     => $gambar->id_gambar_objek
            ]);

            $swal = [
                'type'  => 'success',
                'title' => 'Data berhasil ditambahkan'
            ];
            return redirect()->route('pariwisata.index')->with('alert', $swal);
        } catch (Exception $e) {
            return redirect()->route('pariwisata.create')
                    ->withErrors($validator)
                    ->withInput();
        }

    }

    public function edit($id){
        $wisata = ObjekWisatas::where('id_objek_wisata', $id)->first();
        $kategoris = JenisWisatas::all();
        $kecamatans = Kecamatans::all();
        $gambar = GambarObjeks::where('id_gambar_objek', $wisata->id_gambar)->first()->gambar;
        return view('dashboard.pariwisatas.edit', [
            'wisata' => $wisata, 
            'kategoris' => $kategoris, 
            'kecamatans' => $kecamatans,
            'gambar' => $gambar
        ]);
    }

    public function destroy($id){
        $wisata = ObjekWisatas::where('id_objek_wisata', $id)->first();

        if($wisata != null){
            try{
                $wisata->delete();
                return true;
            }catch(Exception $e){
                return false;
            }
        }

        return false;
    }
}
