<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data       = DB::table('datapertahun')->get();

        $NON_PNBP   = [];
        $BPPTnbh    = [];
        $KERJASAMA  = [];
        $IGU        = [];
        $INTEGRASI  = [];
        $tahun      = [];

        foreach ($data as $key) {

            $tahun[]        = $key->tahun;
            $NON_PNBP[]     = $key->NON_PNBP;
            $BPPTnbh[]      = $key->BPPTnbh;
            $KERJASAMA[]    = $key->KERJASAMA;
            $IGU[]          = $key->IGU;
            $INTEGRASI[]    = $key->INTEGRASI;
        }

        $dataPegawai    = DB::table('data_pegawai')->get();

        return view('home', ['data' => $data, 'tahun' => $tahun, 'NON_PNBP' => $NON_PNBP, 'BPPTnbh' => $BPPTnbh, 'KERJASAMA' => $KERJASAMA, 'IGU' => $IGU, 'INTEGRASI' => $INTEGRASI, 'dataPegawai' => $dataPegawai]);
    }
}
