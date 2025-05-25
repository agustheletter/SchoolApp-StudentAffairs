<?php

namespace App\Http\Controllers;

use App\Models\KehadiranModel;
use App\Models\SiswaModel;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function kehadiran()
    {
       $siswa = SiswaModel::all();
       $kehadiran = KehadiranModel::with('siswa')->get();
       return view('admin.pages.kehadiran.v_kehadiran', compact('siswa', 'kehadiran'));
    }



    public function kehadirantambah(Request $request)
    {
        $request->validate([
            'jeniskehadiran' => 'required|in:Alpha,Izin,Sakit,dispen',
            'keterangan' => 'nullable|string',
            'idsiswa' => 'required|array',
            'idsiswa.*' => 'exists:tbl_siswa,idsiswa',
            'hari' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        foreach ($request->idsiswa as $siswaId) {
            KehadiranModel::create([
                'jeniskehadiran' => $request->jeniskehadiran,
                'keterangan' => $request->keterangan,
                'idsiswa' => $siswaId,
                'hari' => $request->hari,
                'tanggal' => $request->tanggal,
            ]);
        }

        return redirect('/kehadiran')->with('success', 'Data kehadiran berhasil ditambahkan');
    }

    public function kehadiranhapus($idkehadiran)
    {
        $kehadiran = KehadiranModel::findOrFail($idkehadiran);
        $kehadiran->delete();

        return redirect()->back()->with('success', 'Data kehadiran berhasil dihapus');
    }

    public function edit($idkehadiran)
    {
        $kehadiran = KehadiranModel::findOrFail($idkehadiran);
        $siswa = SiswaModel::all();
        return view('admin.pages.kehadiran.edit', compact('kehadiran', 'siswa'));
    }

    public function kehadiranedit($idkehadiran, Request $request)
    {
        $request->validate([
            'jeniskehadiran' => 'required|in:Alpha,Izin,Sakit,dispen',
            'keterangan' => 'nullable|string',
            'idsiswa' => 'required|exists:tbl_siswa,idsiswa',
            'hari' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $kehadiran = KehadiranModel::findOrFail($idkehadiran);
        $kehadiran->update([
            'jeniskehadiran' => $request->jeniskehadiran,
            'keterangan' => $request->keterangan,
            'idsiswa' => $request->idsiswa,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
        ]);

        $kehadiran->save();

        return redirect('/kehadiran')->with('success', 'Data kehadiran berhasil diperbarui');
    }

}
