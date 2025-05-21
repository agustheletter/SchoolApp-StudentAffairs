<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;
use App\Models\SiswaModel;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;


// panggil model siswa
use App\Models\SiswaKelasModel;

// panggil model Siswa Kelas
use App\Models\KelasDetailModel;

// panggil model Tahun AJaran
use App\Models\TahunAjaranModel;

// panggil model Kelas
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

class SiswaKelasController extends Controller
{
    //====================AWAL METHODE UNTUK TAMPIL siswa=================
    //tampil dengan eloquent
    public function siswakelas()
    {
        //ambil idtahun ajaran aktif
        $idthnajaran = Session::get('idthnajaran');

        //ambil data detail kelas berdasarkan tahun ajaran aktif
        $kelasdetail    = KelasDetailModel::where('tbl_kelasdetail.idthnajaran',$idthnajaran)
        ->get();

        // mengirim data siswa kelas ke view siswa kelas
        return view('admin.pages.siswa.v_siswakelas',
            [
                // 'siswakelas' => $siswakelas,
                // 'siswa' => $siswa,
                // 'thnajaran' => $thnajaran,
                'kelasdetail' => $kelasdetail,
            ]);
    }
    //===================AKHIR METHODE UNTUK TAMPIL siswa================



    //====================AWAL METHODE UNTUK CARI KELAS SISWA CARI=================
    public function siswakelascari(Request $request)
    {
        //katakunci untuk tombol cari kelas siswa
        $katakunci = $request->carikelas;

        //ambil idtahun ajaran aktif
        $idthnajaran = Session::get('idthnajaran');

        //ambil data detail kelas berdasarkan tahun ajaran aktif
        $kelasdetail    = KelasDetailModel::where('tbl_kelasdetail.idthnajaran',$idthnajaran)
        ->get();

        // mengambil data siswa
        $siswakelas = SiswaKelasModel::
        join('tbl_siswa','tbl_siswa.idsiswa','=','tbl_siswakelas.idsiswa')
        ->join('tbl_kelasdetail','tbl_kelasdetail.idkelasdetail','=','tbl_siswakelas.idkelasdetail')
        ->join('tbl_kelas','tbl_kelas.idkelas','=','tbl_kelasdetail.idkelas')

        //tahun ajaran harus diganti dengan variable ketika mengaktifkan thn ajaran
        ->where('tbl_kelasdetail.idthnajaran',Session::get('idthnajaran'))
        ->where('tbl_kelas.namakelas', $katakunci)
        ->orderby('tbl_siswa.idsiswa', 'ASC')
        ->get();
        //->paginate(10);



        // mengirim data siswa kelas ke view siswa kelas
        return view('admin.pages.siswa.v_siswakelascari',
            [
                'siswakelas' => $siswakelas,
                // 'siswa' => $siswa,
                // 'thnajaran' => $thnajaran,
                'kelasdetail' => $kelasdetail,
                'katakunci'=>$katakunci
            ]);
    }
    //====================AKHIR METHODE UNTUK CARI KELAS SISWA CARI=================



    //====================AWAL METHODE UNTUK TAMBAH siswa=================
    //method tambah data siswa dengan eloquent
    public function siswakelastambah(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'idsiswakelas' => 'required',
            'idsiswa' => 'required',
            'nis' => 'required',
            'idthnajaran' => 'required',
            'idkelas' => 'required'
        ]);


        SiswaKelasModel::create([
            'idsiswakelas' => $request->idsiswakelas,
            'idsiswa' => $request->idsiswa,
            'nis' => $request->nis,
            'idthnajaran' => $request->idthnajaran,
            'idkelas' => $request->idkelas
        ]);

        //dd($x);
        //kembali ke halaman awal
        return redirect('/siswakelas');
    }
    //====================AKHIR METHODE UNTUK TAMBAH siswa=================


    //====================AWAL METHODE UNTUK HAPUS siswa=================
    public function siswakelashapus($idsiswakelas)
    {
        $siswakelas = SiswaKelasModel::find($idsiswakelas);
        $siswakelas->delete();

        return redirect()->back();
    }
    //====================AKHIR METHODE UNTUK HAPUS siswa=================


    //====================AWAL METHODE UNTUK EDIT siswa=================
    public function siswakelasedit($idsiswakelas, Request $request)
    {
        $request->validate([
            'idsiswakelas' => 'required',
            'idsiswa' => 'required',
            'nis' => 'required',
            'idthnajaran' => 'required',
            'idkelas' => 'required'
        ]);


        $siswakelas = SiswaKelasModel::find($idsiswakelas);
        $siswakelas->idsiswakelas = $request->idsiswakelas;
        $siswakelas->idthnajaran = $request->idthnajaran;
        $siswakelas->idkelas = $request->idkelas;
        $siswakelas->idsiswa = $request->idsiswa;
        $siswakelas->nis = $request->nis;


        $siswakelas->save();

        return redirect()->back();
    }
    //====================AKHIR METHODE UNTUK EDIT siswa=================

}
