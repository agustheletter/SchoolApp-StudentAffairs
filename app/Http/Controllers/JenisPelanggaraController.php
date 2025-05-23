<?php

namespace App\Http\Controllers;

use App\Models\JenisBayarModel;
use App\Models\JenisPelanggaranModel;
use Illuminate\Http\Request;
use App\Models\SiswaPelanggaran;
use Illuminate\Support\Facades\File;

class JenisPelanggaraController extends Controller
{
    public function jenispelanggaran()
    {
    // mengambil data siswa
        // $siswa = SiswaModel::orderby('idsiswa', 'ASC')
        // ->paginate();
        $JenisPelanggaran = JenisPelanggaranModel::all();

        // mengirim data siswa ke view siswa
        //dd($siswa);
        return view('admin.pages.pelanggaran.v_jenispelanggaran', ['jenispelanggaran' => $JenisPelanggaran]);
    }

    //====================AWAL METHODE UNTUK TAMBAH siswa pelanggaran=================
    //method tambah data siswa dengan eloquent
    public function jenispelanggarantambah(Request $request)
    {
        //dd($request->all());
        $request->validate([
            //'idsiswa' => 'required',
            'nama' => 'required',
            'tingkat' => 'required',
            'deskripsi' => 'required',
        ]);

        //siswaModel::create([
        JenisPelanggaranModel::create([
            //'idsiswa' => $request->idsiswa,
            'nama' => $request->nama,
            'tingkat' => $request->tingkat,
            'deskripsi' => $request->deskripsi,
        ]);

        //dd($x);
        //kembali ke halaman awal
        return redirect('/jenispelanggaran');
    }
    //====================AKHIR METHODE UNTUK TAMBAH siswa pelanggaran=================
    // HAPUS PELANGGARAN
    public function jenispelanggaranhapus($idjenispelanggaran)
    {
        $jenispelangaran = JenisPelanggaranModel::find($idjenispelanggaran);
        $jenispelangaran->delete();

        return redirect()->back();
    }

    public function jenispelanggaranedit(Request $request, $idjenispelanggaran)
    {
        $request->validate([
            'nama' => 'required',
            'tingkat' => 'required',
            'deskripsi' => 'required',
        ]);

        $jenispelangaran = JenisPelanggaranModel::find($idjenispelanggaran);

        $jenispelangaran->nama = $request->nama;
        $jenispelangaran->tingkat = $request->tingkat;
        $jenispelangaran->deskripsi = $request->deskripsi;

        $jenispelangaran->save();

        return redirect()->back();
    }
}
