<?php

namespace App\Http\Controllers;

use App\Models\DataProdi;
use Illuminate\Http\Request;

class DataprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($prodi)
    {
        $data   = DataProdi::where('nama_prodi','=',$prodi)->get();

        foreach ($data as $key) {
            
            $nama_prodi     = $key->nama_prodi;
        }

        return view('InventarisBarang.mini_admin.data-prodi',['data' => $data , 'nama_prodi' => $nama_prodi]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataProdi  $dataProdi
     * @return \Illuminate\Http\Response
     */
    public function show($nama_barang , DataProdi $dataProdi)
    {
        $prodi = DataProdi::where('nama_barang','=',$nama_barang)->get();

        return view('InventarisBarang.mini_admin.detail-barang',['dataProdi' => $dataProdi , 'prodi' => $prodi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataProdi  $dataProdi
     * @return \Illuminate\Http\Response
     */
    public function edit(DataProdi $dataProdi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataProdi  $dataProdi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataProdi $dataProdi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataProdi  $dataProdi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataProdi $dataProdi)
    {
        //
    }
}
