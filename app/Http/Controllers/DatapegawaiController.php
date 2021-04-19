<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
use Illuminate\Http\Request;

class DatapegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data-pegawai.home-pegawai');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('DataKepegawaian.pages.add-dataPegawai');
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
            'gambar'        => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048'

        ]);

        $pesan = ([
            'image'         => 'ekstension gambar yang valid adalah ( jpg , png , jpeg , JPG , PNG , JPEG)'
        ]);

        $this->validate($request,$rules,$pesan);

        Datapegawai::create([
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
            'nama'          => $requeste->nama,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataPegawai  $dataPegawai
     * @return \Illuminate\Http\Response
     */
    public function show(DataPegawai $dataPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPegawai  $dataPegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPegawai $dataPegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPegawai  $dataPegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPegawai $dataPegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPegawai  $dataPegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPegawai $dataPegawai)
    {
        //
    }
}
