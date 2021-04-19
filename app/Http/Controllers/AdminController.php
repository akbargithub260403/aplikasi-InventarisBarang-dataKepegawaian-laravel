<?php

namespace App\Http\Controllers;

use File;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('InventarisBarang.super_admin.add_admin');
    }

    public function create_pegawai()
    {
        return view('DataKepegawaian.pages.add-admin');
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
            'name'          => 'required',
            'email'         => 'required',
            'password'      => 'required|max:25',
            'ttl'           => 'required',
            'unit_kerja'    => 'required',
            'role'          => 'required',
            'NIP'           => 'required|max:13',
            'gambar'        => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048'

        ]);

        $pesan = ([
            'required'      => 'Kolom ini harus di isi',
            'max'           => 'maksimal kolom adalah 25 karakter',
            'image'         => 'ekstension gambar yang valid adalah ( jpg , png , jpeg , JPG , PNG , JPEG)'
        ]);

        $this->validate($request,$rules,$pesan);

        // menyimpan data file yang diupload ke variabel $file
        $gambar = $request->file('gambar');
 
		$nama_gambar = time()."_".$gambar->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images';

        $gambar->move($tujuan_upload,$nama_gambar);

        Admin::create([
            'name'            => $request->name,
            'email'           => $request->email,
            'password'        => bcrypt($request->password),
            'ttl'             => $request->ttl,
            'unit_kerja'      => $request->unit_kerja,
            'role'            => $request->role,
            'status'          => $request->prodi,
            'NIP'             => $request->NIP,
            'gambar'          => $nama_gambar,
        ]);

        return back()->with('status','Akun admin berhasil ditambahkan');

    }

    public function store_pegawai(Request $request)
    {
        $rules = ([
            'name'          => 'required',
            'email'         => 'required',
            'password'      => 'required|max:25',
            'ttl'           => 'required',
            'unit_kerja'    => 'required',
            'NIP'           => 'required|max:13',
            'gambar'        => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048'

        ]);

        $pesan = ([
            'required'      => 'Kolom ini harus di isi',
            'max'           => 'maksimal kolom adalah 25 karakter',
            'image'         => 'ekstension gambar yang valid adalah ( jpg , png , jpeg , JPG , PNG , JPEG)'
        ]);

        $this->validate($request,$rules,$pesan);

        // menyimpan data file yang diupload ke variabel $file
        $gambar = $request->file('gambar');
 
		$nama_gambar = time()."_".$gambar->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images';

        $gambar->move($tujuan_upload,$nama_gambar);
        
         Admin::create([
            'name'            => $request->name,
            'email'           => $request->email,
            'password'        => bcrypt($request->password),
            'ttl'             => $request->ttl,
            'unit_kerja'      => $request->unit_kerja,
            'role'            => 'admin_pegawai',
            'status'          => '',
            'NIP'             => $request->NIP,
            'gambar'          => $nama_gambar,
        ]);

        return back()->with('status','Akun admin berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('InventarisBarang.super_admin.profileAdmin',['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin , $NIP)
    {
        $this->validate($request,[
            'name'              => 'required',
            'email'             => 'required',
            'NIP'               => 'required',
            'ttl'               => 'required',
            'unit_kerja'        => 'required'
        ]);


        Admin::where('id','=',$admin->id)
            ->update([
                'name'              => $request->name,
                'email'             => $request->email,
                'NIP'               => $request->NIP,
                'ttl'               => $request->ttl,
                'unit_kerja'        => $request->unit_kerja,

            ]);
        
        return back()->with('status','Data akun berhasil di Update');
    }

    public function update_gambar(Request $request , Admin $admin)
    {
        $this->validate($request,[
            'gambar'        => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048'
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $gambar = $request->file('gambar');
 
		$nama_gambar = time()."_".$gambar->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images';

        $gambar->move($tujuan_upload,$nama_gambar);

        // Hapus data di LastData
        $hapus = Admin::where('id',$admin->id)->first();

        File::delete('images/'.$hapus->gambar);

        Admin::where('id','=',$admin->id)
            ->update([
                'gambar'              => $nama_gambar,
            ]);
        
        return back()->with('status','Data Profile berhasil di Update');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
