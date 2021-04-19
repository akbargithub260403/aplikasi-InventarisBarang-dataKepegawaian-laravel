<?php

namespace App\Http\Controllers;

use File;
use PDF;

use App\Models\Admin;
use App\Models\Barang;
use App\Models\DataperTahun;
use App\Models\Lastdata;
use App\Models\DataProdi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function login($data)
    {
        return view('auth.login', ['data' => $data]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::all();

        return view('InventarisBarang.super_admin.tabelBarang', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tahun = DB::table('datapertahun')->get('tahun');

        $kode_barang    = rand(0, 1000000000);

        return view('InventarisBarang.super_admin.add-barang', ['kode_barang' => $kode_barang, 'tahun' => $tahun]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ([
            'kode_barang'   => 'required',
            'nama_barang'   => 'required',
            'jumlah_barang' => 'required',
            'lokasi'        => 'required',
            'harga_barang'  => 'required',
            'keterangan'    => 'required',
            'gambar'        => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048'

        ]);

        $pesan = ([
            'required'      => 'Kolom ini harus di isi',
            'max'           => 'maksimal kolom adalah 25 karakter',
            'image'         => 'ekstension gambar yang valid adalah ( jpg , png , jpeg , JPG , PNG , JPEG)'
        ]);

        $this->validate($request, $rules, $pesan);

        $data   = DataperTahun::where('tahun', '=', $request->thn_peroleh)->get();

        foreach ($data as $dt) {

            $jumlah_total       = $dt->jumlah_total     + $request->jumlah_barang;
            $NON_PNBP           = $dt->NON_PNBP         + $request->jumlah_barang;
            $BPPTnbh            = $dt->BPPTnbh          + $request->jumlah_barang;
            $KERJASAMA          = $dt->KERJASAMA        + $request->jumlah_barang;
            $IGU                = $dt->IGU              + $request->jumlah_barang;
            $INTEGRASI          = $dt->INTEGRASI        + $request->jumlah_barang;
        }


        if ($request->sumber_dana == 'NON_PNBP') {

            DataperTahun::where('tahun', '=', $request->thn_peroleh)
                ->update([
                    'NON_PNBP'      => $NON_PNBP,
                    'jumlah_total'  => $jumlah_total
                ]);
        } elseif ($request->sumber_dana == 'BPPTnbh') {

            DataperTahun::where('tahun', '=', $request->thn_peroleh)
                ->update([
                    'BPPTnbh'       => $BPPTnbh,
                    'jumlah_total'  => $jumlah_total
                ]);
        } elseif ($request->sumber_dana == 'KERJASAMA') {

            DataperTahun::where('tahun', '=', $request->thn_peroleh)
                ->update([
                    'KERJASAMA'      => $KERJASAMA,
                    'jumlah_total'  => $jumlah_total
                ]);
        } elseif ($request->sumber_dana == 'IGU') {

            DataperTahun::where('tahun', '=', $request->thn_peroleh)
                ->update([
                    'IGU'      => $IGU,
                    'jumlah_total'  => $jumlah_total
                ]);
        } elseif ($request->sumber_dana == 'INTEGRASI') {

            DataperTahun::where('tahun', '=', $request->thn_peroleh)
                ->update([
                    'INTEGRASI'      => $INTEGRASI,
                    'jumlah_total'  => $jumlah_total
                ]);
        }


        // menyimpan data file yang diupload ke variabel $file
        $gambar = $request->file('gambar');

        $nama_gambar = time() . "_" . $gambar->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images/images-barang';

        $gambar->move($tujuan_upload, $nama_gambar);

        Barang::create([
            'kode_barang'       => $request->kode_barang,
            'nama_barang'       => $request->nama_barang,
            'jenis_barang'      => $request->jenis_barang,
            'lokasi'            => $request->lokasi,
            'jumlah_barang'     => $request->jumlah_barang,
            'sumber_dana'       => $request->sumber_dana,
            'harga_barang'      => $request->harga_barang,
            'kondisi'           => $request->kondisi,
            'thn_peroleh'       => $request->thn_peroleh,
            'gambar'            => $nama_gambar,
            'keterangan'        => $request->keterangan,
        ]);



        return back()->with('status', 'Data barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($nama_barang, Barang $barang)
    {
        $prodi = DataProdi::where('nama_barang', '=', $nama_barang)->get();

        return view('InventarisBarang.super_admin.detail-barang', ['barang' => $barang, 'prodi' => $prodi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($kode_barang, Barang $barang)
    {
        return view('InventarisBarang.super_admin.update-barang', ['barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $rules = ([
            'kode_barang'   => 'required',
            'nama_barang'   => 'required',
            'jenis_barang'  => 'required',
            'lokasi'        => 'required',
            'sumber_dana'   => 'required',
            'jumlah_barang' => 'required',
            'harga_barang'  => 'required',
            'kondisi'       => 'required',
            'thn_peroleh'   => 'required',
            'keterangan'    => 'required',
        ]);

        $pesan = ([
            'required'      => 'Kolom ini harus di isi',
            'max'           => 'maksimal kolom adalah 25 karakter',
            'image'         => 'ekstension gambar yang valid adalah ( jpg , png , jpeg , JPG , PNG , JPEG)'
        ]);

        $this->validate($request, $rules, $pesan);

        Barang::where('id', '=', $barang->id)
            ->update([
                'kode_barang'       => $request->kode_barang,
                'nama_barang'       => $request->nama_barang,
                'lokasi'            => $request->lokasi,
                'harga_barang'      => $request->harga_barang,
                'kondisi'           => $request->kondisi,
                'keterangan'        => $request->keterangan,
            ]);

        return redirect('/data-barang')->with('status', 'Data barang berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_barang, Barang $barang)
    {
        LastData::create([
            'nama_prodi'            => $barang->nama_prodi,
            'kode_barang'           => $barang->kode_barang,
            'nama_barang'           => $barang->nama_barang,
            'jenis_barang'          => $barang->jenis_barang,
            'lokasi'                => $barang->lokasi,
            'jumlah_barang'         => $barang->jumlah_barang,
            'sumber_dana'           => $barang->sumber_dana,
            'harga_barang'          => $barang->harga_barang,
            'kondisi'               => $barang->kondisi,
            'thn_peroleh'           => $barang->thn_peroleh,
            'gambar'                => $barang->gambar,
            'keterangan'            => $barang->keterangan,
        ]);

        // Update data di Highcharts Datapertahun
        $data   = DataperTahun::where('tahun', '=', $barang->thn_peroleh)->get();

        foreach ($data as $dt) {

            $jumlah_total       = $dt->jumlah_total     - $barang->jumlah_barang;
            $NON_PNBP           = $dt->NON_PNBP         - $barang->jumlah_barang;
            $BPPTnbh            = $dt->BPPTnbh          - $barang->jumlah_barang;
            $KERJASAMA          = $dt->KERJASAMA        - $barang->jumlah_barang;
            $IGU                = $dt->IGU              - $barang->jumlah_barang;
            $INTEGRASI          = $dt->INTEGRASI        - $barang->jumlah_barang;
        }

        if ($barang->sumber_dana == 'NON_PNBP') {

            DataperTahun::where('tahun', '=', $barang->thn_peroleh)
                ->update([
                    'NON_PNBP'      => $NON_PNBP,
                    'jumlah_total'  => $jumlah_total
                ]);
        } elseif ($barang->sumber_dana == 'BPPTnbh') {

            DataperTahun::where('tahun', '=', $barang->thn_peroleh)
                ->update([
                    'BPPTnbh'       => $BPPTnbh,
                    'jumlah_total'  => $jumlah_total
                ]);
        } elseif ($barang->sumber_dana == 'KERJASAMA') {

            DataperTahun::where('tahun', '=', $barang->thn_peroleh)
                ->update([
                    'KERJASAMA'      => $KERJASAMA,
                    'jumlah_total'  => $jumlah_total
                ]);
        } elseif ($barang->sumber_dana == 'IGU') {

            DataperTahun::where('tahun', '=', $barang->thn_peroleh)
                ->update([
                    'IGU'      => $IGU,
                    'jumlah_total'  => $jumlah_total
                ]);
        } elseif ($barang->sumber_dana == 'INTEGRASI') {

            DataperTahun::where('tahun', '=', $barang->thn_peroleh)
                ->update([
                    'INTEGRASI'      => $INTEGRASI,
                    'jumlah_total'  => $jumlah_total
                ]);
        }

        Barang::destroy($barang->id);

        DB::table('dataprodi')->where('kode_barang', '=', $barang->kode_barang)->delete();

        return redirect('/data-barang')->with('status', 'Data barang berhasil Dimusnahkan');
    }

    public function jenis_barang($jenis)
    {
        if ($jenis == 'Elektronik') {

            $data   = Barang::where('jenis_barang', '=', $jenis)->get();
            return view('InventarisBarang.pages.jenis-barang', ['data' => $data]);
        } elseif ($jenis == 'Non-Elektronik') {

            $data   = Barang::where('jenis_barang', '=', $jenis)->get();
            return view('InventarisBarang.pages.jenis-barang', ['data' => $data]);
        }
    }

    public function kondisi_barang($kondisi_barang)
    {
        if ($kondisi_barang == 'Baik') {

            $data   = Barang::where('kondisi', '=', $kondisi_barang)->get();
            return view('InventarisBarang.pages.kondisi-barang', ['data' => $data, 'kondisi_barang' => $kondisi_barang]);
        } elseif ($kondisi_barang == 'Sedang') {

            $data   = Barang::where('kondisi', '=', $kondisi_barang)->get();
            return view('InventarisBarang.pages.kondisi-barang', ['data' => $data, 'kondisi_barang' => $kondisi_barang]);
        } elseif ($kondisi_barang == 'Berat') {

            $data   = Barang::where('kondisi', '=', $kondisi_barang)->get();
            return view('InventarisBarang.pages.kondisi-barang', ['data' => $data, 'kondisi_barang' => $kondisi_barang]);
        }
    }

    public function send_data($kode_barang, $barang, Request $request)
    {
        $data   = Barang::where('kode_barang', '=', $kode_barang)->get();

        foreach ($data as $dt) {

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

        DataProdi::create([
            'nama_prodi'            => $request->nama_prodi,
            'kode_barang'           => $kode_barang,
            'nama_barang'           => $nama_barang,
            'jenis_barang'          => $jenis_barang,
            'lokasi'                => $lokasi,
            'jumlah_barang'         => $jumlah_barang,
            'sumber_dana'           => $sumber_dana,
            'harga_barang'          => $harga_barang,
            'kondisi'               => $kondisi,
            'thn_peroleh'           => $thn_peroleh,
            'gambar'                => $gambar,
            'keterangan'            => $keterangan,
        ]);

        Barang::where('id', '=', $barang)
            ->update([
                'nama_prodi'    => $request->nama_prodi
            ]);

        return back()->with('status', 'Data berhasil dikirimkan');
    }

    public function add_tahun(Request $request)
    {
        DB::table('datapertahun')
            ->insert([
                'tahun'     => $request->tahun,
                'NON_PNBP'  => 0,
                'BPPTnbh'   => 0,
                'KERJASAMA' => 0,
                'IGU'       => 0,
                'INTEGRASI' => 0,
                'jumlah_total'  => 0
            ]);

        return redirect('/home');
    }

    public function export()
    {
        return view('InventarisBarang.pages.export');
    }

    public function export_barang($data)
    {
        if ($data == 'all_barang') {

            $data       = Barang::all();
            $keterangan = "";

            return view('InventarisBarang.pages.export.export-barang', ['data' => $data, 'keterangan' => $keterangan]);
        } elseif ($data == 'elektronik') {

            $data       = Barang::where('jenis_barang', '=', 'ELEKTRONIK')->get();
            $keterangan = "Elektronik";

            return view('InventarisBarang.pages.export.export-barang', ['data' => $data, 'keterangan' => $keterangan]);
        } elseif ($data == 'non-elektronik') {

            $data       = Barang::where('jenis_barang', '=', 'NON-ELEKTRONIK')->get();
            $keterangan = "Non-Elektronik";

            return view('InventarisBarang.pages.export.export-barang', ['data' => $data, 'keterangan' => $keterangan]);
        }
    }

    public function export_barang_kondisi($data)
    {
        if ($data == 'Baik') {

            $data       = Barang::where('kondisi', '=', 'Baik')->get();
            $keterangan = "Baik";

            return view('InventarisBarang.pages.export.export-barang', ['data' => $data, 'keterangan' => $keterangan]);
        } elseif ($data == 'Sedang') {

            $data       = Barang::where('kondisi', '=', 'Sedang')->get();
            $keterangan = "Rusak Sedang";

            return view('InventarisBarang.pages.export.export-barang', ['data' => $data, 'keterangan' => $keterangan]);
        } elseif ($data == 'Berat') {

            $data       = Barang::where('kondisi', '=', 'Berat')->get();
            $keterangan = "Rusak Berat";

            return view('InventarisBarang.pages.export.export-barang', ['data' => $data, 'keterangan' => $keterangan]);
        }
    }

    public function export_upi($data)
    {
        if ($data == 'toko') {

            $data           = DB::table('data_toko')->get();
            $keterangan     = "Data Toko";

            return view('InventarisBarang.pages.export.export-toko', ['data' => $data, 'keterangan' => $keterangan]);
        } elseif ($data == 'admin') {

            $data           = Admin::all();
            $keterangan     = "Data Admin";

            return view('InventarisBarang.pages.export.export-admin', ['data' => $data, 'keterangan' => $keterangan]);
        }
    }

    public function export_pdf($data)
    {
        if ($data == 'all_barang') {

            $data = Barang::all();

            $pdf = PDF::loadview('InventarisBarang.pages.export.export-pdf', ['data' => $data]);

            return $pdf->download('Data-Barang.pdf');
        } elseif ($data == 'elektronik') {

            $data = Barang::where('jenis_barang', '=', 'ELEKTRONIK')->get();

            $pdf = PDF::loadview('pInventarisBarang.ages.export.export-pdf', ['data' => $data]);

            return $pdf->download('Data-Barang.pdf');
        } elseif ($data == 'non-elektronik') {

            $data = Barang::where('jenis_barang', '=', 'NON-ELEKTRONIK')->get();

            $pdf = PDF::loadview('InventarisBarang.pages.export.export-pdf', ['data' => $data]);

            return $pdf->download('Data-Barang.pdf');
        } elseif ($data == 'Baik') {

            $data = Barang::where('kondisi', '=', 'Baik')->get();

            $pdf = PDF::loadview('InventarisBarang.pages.export.export-pdf', ['data' => $data]);

            return $pdf->download('Data-Barang.pdf');
        } elseif ($data == 'Sedang') {

            $data = Barang::where('kondisi', '=', 'Sedang')->get();

            $pdf = PDF::loadview('InventarisBarang.pages.export.export-pdf', ['data' => $data]);

            return $pdf->download('Data-Barang.pdf');
        } elseif ($data == 'Berat') {

            $data = Barang::where('kondisi', '=', 'Berat')->get();

            $pdf = PDF::loadview('InventarisBarang.pages.export.export-pdf', ['data' => $data]);

            return $pdf->download('Data-Barang.pdf');
        } elseif ($data == 'toko') {

            $data = DB::table('data_toko')->get();

            $pdf = PDF::loadview('InventarisBarang.pages.export.export-datatoko-pdf', ['data' => $data]);

            return $pdf->download('Data-toko.pdf');
        } elseif ($data == 'admin') {

            $data = Admin::all();

            $pdf = PDF::loadview('InventarisBarang.pages.export.export-dataadmin-pdf', ['data' => $data]);

            return $pdf->download('Data-Admin.pdf');
        }
    }

    public function deleteBarangSelected(Request $request)
    {
        $ids = $request->ids;
        Lastdata::wherein('id', $ids)->delete();
        return respone()->json(['success' => "Data barang berhasil di Hapus"]);
    }

    public function search(Request $request)
    {
        $search     = $request->search;

        $data       = Barang::where('kode_barang', 'LIKE', "%" . $search . "%")
            ->orWhere('nama_barang', 'LIKE', "%" . $search . "%")
            ->orWhere('sumber_dana', 'LIKE', "%" . $search . "%")
            ->get();
        return view('InventarisBarang.super_admin.tabelBarang', ['data' => $data]);
    }
}
