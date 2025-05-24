<?php

namespace App\Http\Controllers;

use App\Models\LoginModel;
use Illuminate\Http\Request;
use App\Models\TahunAjaranModel;

//panggil model Tahun Ajaran
use Illuminate\Support\Facades\DB;

//panggil model Login
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //Fungsi menampilkan halaman Login
    public function login()
    {
        if (Auth::check())
        {
            return redirect('/homeadmin');
        }
        else
        {
            $datathnajaran = TahunAjaranModel::all();
            return view('admin/login',['thnajaran' => $datathnajaran]);
        }
    }


    //Fungsi untuk AKSI Login
    public function loginaksi(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            // 'thnajaran' => $request->input('text')
        ];


        if (Auth::Attempt($data))
        {
            // menangkap data ID tahun ajaran
            $katakunci = $request->thnajaran;
            $request->session()->put('idthnajaran', $katakunci);

            //ambil seluruh data nama tahun ajaran
            $tahunajaran = TahunAjaranModel::select("*")
            ->where('tbl_thnajaran.idthnajaran',$katakunci)
            ->first();

            $namatahun = $tahunajaran->thnajaran;
            $request->session()->put('namatahunajaran', $namatahun);


            //insert data ke table tbl_login untuk mengatahui siapa saja yang melakukan login
            LoginModel::create([
                'email' => $request->email,
                'idthnajaran' => $request->thnajaran
            ]);

            return redirect('/homeadmin');
            // return redirect('/home',$katakunci);
        }
        else
        {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/admin');
        }
    }


    //Fungsi untuk LOGOUT
    public function logoutaksi()
    {
        Auth::logout();
        return redirect('/admin');
    }

}
