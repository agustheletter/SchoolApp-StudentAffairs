<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruModel;
use App\Models\AgamaModel;
use Illuminate\Support\Facades\File;

class GuruController extends Controller
{
    // TAMPIL GURU
    public function guru()
    {
        $guru = GuruModel::all();
        $agama = AgamaModel::all();
        return view('admin.pages.guru.v_guru', compact('guru', 'agama'));
    }

    public function formTambahGuru()
{
    $agama = AgamaModel::all(); // ambil data agama untuk dropdown
    return view('admin.pages.guru.v_gurutambah', compact('agama'));
}


    // TAMBAH GURU
    public function gurutambah(Request $request)
    {
        $request->validate([
            'idguru' => 'required',
            'nip' => 'required',
            'nuptk' => 'required',
            'namaguru' => 'required',
            'tempatlahir' => 'required',
            'tgllahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'idagama' => 'required',
            'tlprumah' => 'required',
            'hpguru' => 'required',
            'photoguru' => 'required|image',
            'statusaktif' => 'required'
        ]);

        $file = $request->file('photoguru');
        $namafile = time() . "_" . $file->getClientOriginalName();
        $file->move('PhotoGuru', $namafile);

        GuruModel::create([
            'idguru' => $request->idguru,
            'nip' => $request->nip,
            'nuptk' => $request->nuptk,
            'namaguru' => $request->namaguru,
            'tempatlahir' => $request->tempatlahir,
            'tgllahir' => $request->tgllahir,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'idagama' => $request->idagama,
            'tlprumah' => $request->tlprumah,
            'hpguru' => $request->hpguru,
            'photoguru' => $namafile,
            'statusaktif' => $request->statusaktif
        ]);

        return redirect('/guru/');
    }

    // HAPUS GURU
    public function guruhapus($idguru)
    {
        $guru = GuruModel::find($idguru);
        File::delete('PhotoGuru/' . $guru->photoguru);
        $guru->delete();

        return redirect()->back();
    }

    // EDIT GURU
    public function guruedit(Request $request, $idguru)
    {
        $request->validate([
            'nip' => 'required',
            'nuptk' => 'required',
            'namaguru' => 'required',
            'tempatlahir' => 'required',
            'tgllahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'idagama' => 'required',
            'tlprumah' => 'required',
            'hpguru' => 'required',
            'statusaktif' => 'required'
        ]);

        $guru = GuruModel::find($idguru);

        if ($request->file('photoguru')) {
            File::delete('PhotoGuru/' . $guru->photoguru);
            $file = $request->file('photoguru');
            $namafile = time() . "_" . $file->getClientOriginalName();
            $file->move('PhotoGuru', $namafile);
            $guru->photoguru = $namafile;
        }

        $guru->nip = $request->nip;
        $guru->nuptk = $request->nuptk;
        $guru->namaguru = $request->namaguru;
        $guru->tempatlahir = $request->tempatlahir;
        $guru->tgllahir = $request->tgllahir;
        $guru->jk = $request->jk;
        $guru->alamat = $request->alamat;
        $guru->idagama = $request->idagama;
        $guru->tlprumah = $request->tlprumah;
        $guru->hpguru = $request->hpguru;
        $guru->statusaktif = $request->statusaktif;

        $guru->save();

        return redirect()->back();
    }

    // CARI GURU BY NAMA
    public function gurudetail(Request $request)
    {
        $katakunci = $request->gurucari;
        $guru = GuruModel::where('namaguru', 'like', "%" . $katakunci . "%")->paginate();
        return view('admin.pages.guru.v_gurudetail', ['guru' => $guru]);
    }
}
