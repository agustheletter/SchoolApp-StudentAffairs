<?php
namespace App\Http\Controllers;
use App\Models\DispenDetailModel;
use App\Models\DispenModel;
use App\Models\GuruModel;
use App\Models\SiswaModel;
use Illuminate\Http\Request;

class DispenController extends Controller
{
    //* TAMPIL Dispen*
    public function dispen()
    {
        $guru = GuruModel::all();
        $siswa = SiswaModel::all();
        $dispen = DispenModel::with(['guru', 'dispendetails.siswa'])->get();
        return view('admin.pages.dispen.v_dispen', compact('guru', 'siswa', 'dispen'));
    }

    public function dispeneditform($iddispen)
    {
        // Fix: Load with dispendetails.siswa to match your view logic
        $dis = DispenModel::with(['dispendetails.siswa', 'guru'])->findOrFail($iddispen);
        $siswa = SiswaModel::all();
        $guru = GuruModel::all();
        return view('admin.pages.dispen.v_dispen', compact('dis', 'siswa', 'guru'));
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

        return redirect('/dispen')->with('success', 'Data berhasil ditambahkan.');
    }

    //* HAPUS DISPEN*
    public function dispenhapus($iddispen)
    {
        // Delete details first (foreign key constraint)
        DispenDetailModel::where('iddispen', $iddispen)->delete();

        // Then delete the main record
        $dispen = DispenModel::find($iddispen);
        if ($dispen) {
            $dispen->delete();
        }

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    public function dispenedit(Request $request, $iddispen)
    {
        // Fix: Add validation for idsiswa
        $request->validate([
            'namadispen' => 'required',
            'waktumulai' => 'required',
            'waktuselesai' => 'required',
            'idguru' => 'required',
            'idsiswa' => 'required|array|min:1',
            'idsiswa.*' => 'exists:tbl_siswa,idsiswa',
        ]);

        // Find the dispen record
        $dispen = DispenModel::find($iddispen);
        if (!$dispen) {
            return redirect()->back()->withErrors(['msg' => 'Data tidak ditemukan']);
        }

        // Update the main dispen record (don't update iddispen - it's primary key)
        $dispen->namadispen = $request->namadispen;
        $dispen->waktumulai = $request->waktumulai;
        $dispen->waktuselesai = $request->waktuselesai;
        $dispen->idguru = $request->idguru;
        $dispen->save();

        // Delete existing details
        DispenDetailModel::where('iddispen', $iddispen)->delete();

        // Insert new details
        foreach ($request->idsiswa as $idsiswa) {
            DispenDetailModel::create([
                'iddispen' => $iddispen,
                'idsiswa' => $idsiswa,
            ]);
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }
}
