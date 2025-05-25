<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;

// panggil model jurusan
use App\Models\JurusanModel;
use Illuminate\Http\Request;
use App\Models\SiswaKelasModel;
use App\Models\BayarDetailModel;
use App\Models\GuruModel;
use App\Models\ProgramKeahlianModel;
use App\Models\RuanganModel;
use App\Models\SiswaModel;
use App\Models\TahunAjaranModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home()
    {
        //ambil idtahun ajaran
        $idthnajaran = Session::get('idthnajaran');
        // dd($idthnajaran);

        //ambil seluruh data tahun ajaran
        $tahunajaran = TahunAjaranModel::select("*")
        ->where('tbl_thnajaran.idthnajaran',Session::get('idthnajaran'))
        ->get();
        // dd($tahunajaran);

        //hitung jumlah jurusan
        $dataprogramkeahlian    = ProgramKeahlianModel::count('namaprogramkeahlian');

        //hitung jumlah jurusan
        $datajurusan    = JurusanModel::count('namajurusan');

        //hitung jumlah kelas berdasarkan tahun ajaran
        $datakelas      = KelasModel::count('namakelas');
        // $datakelas      = KelasModel::select("*")
        // ->join('tbl_siswakelas','tbl_siswakelas.idkelas','=','tbl_kelas.idkelas')
        // ->where('tbl_siswakelas.idthnajaran',Session::get('idthnajaran'))
        // ->count();

        //hitung jumlah ruangan
        $dataruangan    = RuanganModel::count('namaruangan');

        //hitung jumlah guru
        $dataguru       = GuruModel::count('namaguru');

        //MENGHITUNG JUMLAH SISWA PADA TAHUN AJARAN AKTIF
        //  select count(*) as aggregate from `tbl_siswakelas`
        // inner join `tbl_kelasdetail` on `tbl_kelasdetail`.`idkelasdetail` = `tbl_siswakelas`.`idkelasdetail`
        // where `tbl_kelasdetail`.`idthnajaran` = 2

        $datasiswa      = SiswaModel::count('namasiswa');

        // $datasiswa      = SiswaKelasModel::select("*")
        // ->join('tbl_kelasdetail','tbl_kelasdetail.idkelasdetail','=','tbl_siswakelas.idkelasdetail')

        // //id tahun ajaran harus diganti dengan varibale supaya bisa dinamis
        // ->where('tbl_kelasdetail.idthnajaran',$idthnajaran)
        // ->count();


        // dd($datajurusan);

        return view('admin/pages/v_home',
            [
                'programkeahlian'=>$dataprogramkeahlian,
                'jurusan'=>$datajurusan,
                'kelas'=>$datakelas,
                'ruangan'=>$dataruangan,
                'siswa'=>$datasiswa,
                'guru'=>$dataguru,
                'tahunajaran'=>$tahunajaran
            ]);
    }

    //====================AWAL METHODE UNTUK TAMPIL TENTANG=================
    public function about()
    {
        // mengirim data guru ke view guru
        return view('admin.pages.v_about');
    }
    //===================AKHIR METHODE UNTUK TAMPIL TENTANG================
}
