<?php

namespace App\Http\Controllers;

use App\Models\DispenDetailModel;
use App\Models\DispenModel;
use App\Models\GuruModel;
use App\Models\SiswaModel;
use Illuminate\Http\Request;

class DispenController extends Controller
{
    // TAMPIL Dispen
    public function dispen()
    {
        $guru = GuruModel::all();
        $siswa = SiswaModel::all();
        $dispen = DispenModel::with(['guru', 'dispendetails.siswa'])->get();


        return view('admin.pages.dispen.v_dispen', compact('guru', 'siswa', 'dispen'));
    }

    public function dispeneditform($iddispen)
    {
        $dis = DispenModel::with('siswa')->findOrFail($iddispen); // <-- agar bisa ambil siswa yang sudah terpilih
        $siswa = SiswaModel::all();

        return view('admin.pages.dispen.v_dispen', compact('dis', 'siswa'));
    }


    public function dispentambah(Request $request)
{
    $request->validate([
        'namadispen' => 'required',
        'waktumulai' => 'required',
        'waktuselesai' => 'required',
        'idguru' => 'required',
        'idsiswa' => 'required|array|min:1',
        'idsiswa.*' => 'exists:tbl_siswa,idsiswa',
    ]);

    $dispen = DispenModel::create([
        'iddispen' => $request->iddispen,
        'namadispen' => $request->namadispen,
        'waktumulai' => $request->waktumulai,
        'waktuselesai' => $request->waktuselesai,
        'idguru' => $request->idguru,
    ]);

    foreach ($request->idsiswa as $idsiswa) {
        DispenDetailModel::create([
            'iddispen' => $dispen->iddispen,
            'idsiswa' => $idsiswa,
        ]);
    }

    return redirect('/dispen');
}



    //====================AKHIR METHODE UNTUK TAMBAH siswa pelanggaran=================
    // HAPUS PELANGGARAN
    public function dispenhapus($iddispen)
    {
        DispenDetailModel::where('iddispen', $iddispen)->delete();
        $dispen = DispenModel::find($iddispen);
        $dispen->delete();

        return redirect()->back();
    }

    public function dispenedit(Request $request, $iddispen)
    {
        $request->validate([
            'iddispen' => 'required',
            'namadispen' => 'required',
            'waktumulai' => 'required',
            'waktuselesai' => 'required',
            'idguru' => 'required',
        ]);

        $dispen = DispenModel::find($iddispen);
        if (!$dispen) {
            return redirect()->back()->withErrors(['msg' => 'Data tidak ditemukan']);
        }

        $dispen = DispenModel::find($iddispen);

        $dispen->iddispen = $request->iddispen;
        $dispen->namadispen = $request->namadispen;
        $dispen->waktumulai = $request->waktumulai;
        $dispen->waktuselesai = $request->waktuselesai;
        $dispen->idguru = $request->idguru;

        $dispen->save();

        DispenDetailModel::where('iddispen', $iddispen)->delete();

        // 2. Insert new details from the request
        foreach ($request->idsiswa as $idsiswa) {
            DispenDetailModel::create([
                'iddispen' => $iddispen,
                'idsiswa' => $idsiswa,
            ]);
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }
}
