<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaPelanggaran;
use Illuminate\Support\Facades\File;
use App\Models\JenisPelanggaranModel;
use App\Models\SiswaModel;

class SiswaPelanggaranController extends Controller
{
    public function pelanggaran()
    {
    // mengambil data siswa
        // $siswa = SiswaModel::orderby('idsiswa', 'ASC')
        // ->paginate();
        $siswa = SiswaModel::all();

        $jenispelanggaran = JenisPelanggaranModel::all();
        $pelanggaran = SiswaPelanggaran::with(['siswa', 'jenispelanggaran'])->get();

        // mengirim data siswa ke view siswa
        //dd($siswa);
        return view('admin.pages.pelanggaran.v_siswapelanggaran', compact('siswa', 'jenispelanggaran', 'pelanggaran'));
    }

    //====================AWAL METHODE UNTUK TAMBAH siswa pelanggaran=================
    //method tambah data siswa dengan eloquent
    public function pelanggarantambah(Request $request)
    {
        $request->validate([
            'idsiswa' => 'required',
            'idjenispelanggaran' => 'required',
            'keterangan' => 'required',
            'photobukti' => 'nullable|image', // tidak wajib, tapi jika ada harus gambar
            'tanggal' => 'required',
        ]);

        $namafile = null;

        if ($request->hasFile('photobukti')) {
            $file = $request->file('photobukti');
            $namafile = time() . "_" . $file->getClientOriginalName();
            $file->move('PhotoBukti', $namafile);
        }

        SiswaPelanggaran::create([
            'idsiswa' => $request->idsiswa,
            'idjenispelanggaran' => $request->idjenispelanggaran,
            'keterangan' => $request->keterangan,
            'photobukti' => $namafile, // null jika tidak ada
            'tanggal' => $request->tanggal,
        ]);

        return redirect('/pelanggaran');
    }

    //====================AKHIR METHODE UNTUK TAMBAH siswa pelanggaran=================
    // HAPUS PELANGGARAN
    public function pelanggaranhapus($idpelanggaran)
    {
        $pelangaran = SiswaPelanggaran::find($idpelanggaran);
        File::delete('PhotoBukti/' . $pelangaran->photobukti);
        $pelangaran->delete();

        return redirect()->back();
    }

    public function pelanggaranedit(Request $request, $idpelanggaran)
    {
        $request->validate([
            'idsiswa' => 'required',
            'idjenispelanggaran' => 'required',
            'keterangan' => 'required',
            'photobukti' => 'nullable|image',
            'tanggal' => 'required',
        ]);

        $pelangaran = SiswaPelanggaran::find($idpelanggaran);

        if ($request->hasFile('photobukti')) {
            if ($pelangaran->photobukti && file_exists(public_path('PhotoBukti/' . $pelangaran->photobukti))) {
                File::delete(public_path('PhotoBukti/' . $pelangaran->photobukti));
            }

            $file = $request->file('photobukti');
            $namafile = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('PhotoBukti'), $namafile);
            $pelangaran->photobukti = $namafile; // simpan hanya nama file
        }

        $pelangaran->idsiswa = $request->idsiswa;
        $pelangaran->idjenispelanggaran = $request->idjenispelanggaran;
        $pelangaran->keterangan = $request->keterangan;
        $pelangaran->tanggal = $request->tanggal;

        $pelangaran->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

}
