<?php

namespace App\Http\Controllers;

use App\Models\LastData;
use App\Models\Barang;
use App\Models\DataProdi;
use App\Models\DataperTahun;

use File;

use Illuminate\Http\Request;

class LastdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data   = LastData::all();

        return view('InventarisBarang.super_admin.last-data',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($kode_barang , $lastData ,Request $request)
    {
        $dataLast   = LastData::where('kode_barang','=',$kode_barang)->get();
        
        foreach ($dataLast as $dt) {
            
            $nama_prodi             = $dt->nama_prodi;
            $kode_barang            = $dt->kode_barang;
            $nama_barang            = $dt->nama_barang;
            $jenis_barang           = $dt->jenis_barang;
            $lokasi                 = $dt->lokasi;
            $jumlah_barang          = $dt->jumlah_barang;
            $sumber_dana            = $dt->sumber_dana;
            $harga_barang           = $dt->harga_barang;
            $kondisi                = $dt->kondisi;
            $thn_peroleh            = $dt->thn_peroleh;
            $gambar                 = $dt->gambar;
            $keterangan             = $dt->keterangan;

        }

        // Insert Data Barang ke Data_barang dari Last Data
        Barang::create([
            'nama_prodi'            =>$nama_prodi,
            'kode_barang'           =>$kode_barang,
            'nama_barang'           =>$nama_barang,
            'jenis_barang'          =>$jenis_barang,
            'lokasi'                =>$lokasi,
            'jumlah_barang'         =>$jumlah_barang,
            'sumber_dana'           =>$sumber_dana,
            'harga_barang'          =>$harga_barang,
            'kondisi'               =>$kondisi,
            'thn_peroleh'           =>$thn_peroleh,
            'gambar'                =>$gambar,
            'keterangan'            =>$keterangan,
        ]);

        // Insert Data Barang ke data_prodi dari 
        DataProdi::create([
            'nama_prodi'            =>$nama_prodi,
            'kode_barang'           =>$kode_barang,
            'nama_barang'           =>$nama_barang,
            'jenis_barang'          =>$jenis_barang,
            'lokasi'                =>$lokasi,
            'jumlah_barang'         =>$jumlah_barang,
            'sumber_dana'           =>$sumber_dana,
            'harga_barang'          =>$harga_barang,
            'kondisi'               =>$kondisi,
            'thn_peroleh'           =>$thn_peroleh,
            'gambar'                =>$gambar,
            'keterangan'            =>$keterangan,
        ]);

        // Update data di Highcharts Datapertahun
        $dataperTahun   = DataperTahun::where('tahun','=',$thn_peroleh)->get();
        
        foreach ($dataperTahun as $dt) {
            
            $NON_PNBP           = $dt->NON_PNBP         + $jumlah_barang;
            $jumlah_total       = $dt->jumlah_total     + $jumlah_barang;
            $BPPTnbh            = $dt->BPPTnbh          + $jumlah_barang;
            $KERJASAMA          = $dt->KERJASAMA        + $jumlah_barang;
            $IGU                = $dt->IGU              + $jumlah_barang;
            $INTEGRASI          = $dt->INTEGRASI        + $jumlah_barang;

        }

        if ($sumber_dana == 'NON_PNBP') {
            
            DataperTahun::where('tahun','=',$thn_peroleh)
                ->update([
                    'NON_PNBP'      => $NON_PNBP,
                    'jumlah_total'  => $jumlah_total
                ]);

        }elseif ($sumber_dana == 'BPPTnbh') {
            
            DataperTahun::where('tahun','=',$thn_peroleh)
                ->update([
                    'BPPTnbh'       => $BPPTnbh,
                    'jumlah_total'  => $jumlah_total
                ]);

        }elseif ($sumber_dana == 'KERJASAMA') {
            
            DataperTahun::where('tahun','=',$thn_peroleh)
                ->update([
                    'KERJASAMA'      => $KERJASAMA,
                    'jumlah_total'  => $jumlah_total
                ]);

        }elseif ($sumber_dana == 'IGU') {
            
            DataperTahun::where('tahun','=',$thn_peroleh)
                ->update([
                    'IGU'      => $IGU,
                    'jumlah_total'  => $jumlah_total
                ]);

        }elseif ($sumber_dana == 'INTEGRASI') {
            
            DataperTahun::where('tahun','=',$thn_peroleh)
                ->update([
                    'INTEGRASI'      => $INTEGRASI,
                    'jumlah_total'  => $jumlah_total
                ]);

        }

        // Menghapus data barang di Last Data
        LastData::destroy($lastData);

        return redirect('/last-data')->with('status','Data Barang berhasil dikembalikan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LastData  $lastData
     * @return \Illuminate\Http\Response
     */
    public function show($kode_barang,LastData $lastData)
    {
        return view('InventarisBarang.pages.detail-lastdata',['lastData' => $lastData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LastData  $lastData
     * @return \Illuminate\Http\Response
     */
    public function edit(LastData $lastData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LastData  $lastData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LastData $lastData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LastData  $lastData
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_barang , LastData $lastData)
    {
        // Hapus data di LastData
        $gambar = LastData::where('id',$lastData->id)->first();

        File::delete('images/images-barang/'.$gambar->gambar);

        LastData::destroy($lastData->id);

        return redirect('/last-data')->with('status','Data barang Berhasil dihapus');
    }
}
