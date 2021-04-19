<?php

namespace App\Http\Controllers;

use App\Models\DataToko;
use Illuminate\Http\Request;

class DatatokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data   = DataToko::all();

        return view('InventarisBarang.pages.data-toko',['data' => $data]);
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
    public function store(Request $request)
    {
        $this->Validate($request,[
            'nama_toko'         => 'required',
            'tanggal_pembelian' => 'required'
        ]);

        DataToko::create([
            'nama_toko'         => $request->nama_toko,
            'tanggal_pembelian' => $request->tanggal_pembelian
        ]);

        return redirect('/data-toko')->with('status','Data Toko berhasil dimasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataToko  $dataToko
     * @return \Illuminate\Http\Response
     */
    public function show(DataToko $dataToko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataToko  $dataToko
     * @return \Illuminate\Http\Response
     */
    public function edit(DataToko $dataToko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataToko  $dataToko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataToko $dataToko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataToko  $dataToko
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataToko $dataToko)
    {
        //
    }
}
