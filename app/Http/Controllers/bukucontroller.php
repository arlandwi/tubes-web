<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\buku;

class bukucontroller extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if ($request->input('search')===null) {
            $bukus = buku::all();
           $search = null;
            return view('buku.index')->with("bukus", $bukus)->with("search", $search);
        
        }
        

        else{
            $search = buku::where('judul_buku', $request->input('search'))->orWhere('judul_buku', 'like', '%' . $request->input('search') . '%')->get();
            return view('buku.index')->with("search", $search);    
        }
       

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $judul = $request->input('judul');
        $pengarang = $request->input('pengarang');
        $penerbit = $request->input('penerbit');
        $tahun = $request->input('tahun');
        $lokasi = $request->input('lokasi');
        $status = $request->input('status');
        $cover = $request->file('cover')->getClientOriginalName();
        $request->file('cover')->storeAs('public/upload', $cover);
        $buku = new buku;
        $buku->judul_buku = $judul;
        $buku->pengarang_buku = $pengarang;
        $buku->penerbit_buku = $penerbit;
        $buku->tahun_buku = $tahun;
        $buku->lokasi = $lokasi;
        $buku->status = $status;
        $buku->cover = $cover;
        $buku->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $cover=$request->file('cover'); 
      if ($cover === null) {
            $mahasiswa = \DB::table('bukus')->select('id_buku')->where('id_buku', $request->input('id_buku'));
            $mahasiswa->update(['judul_buku' => $request->input('judul')]);
            $mahasiswa->update(['pengarang_buku' => $request->input('pengarang')]);
            $mahasiswa->update(['penerbit_buku' => $request->input('penerbit')]);
            $mahasiswa->update(['tahun_buku' => $request->input('tahun')]);
            $mahasiswa->update(['lokasi' => $request->input('lokasi')]);
            $mahasiswa->update(['status' => $request->input('status')]);
        
        }else{
            $cover=$request->file('cover')->getClientOriginalName();
            $request->file('cover')->storeAs('public/upload', $cover);
            $mahasiswa = \DB::table('bukus')->select('id_buku')->where('id_buku', $request->input('id_buku'));
            $mahasiswa->update(['judul_buku' => $request->input('judul')]);
            $mahasiswa->update(['pengarang_buku' => $request->input('pengarang')]);
            $mahasiswa->update(['penerbit_buku' => $request->input('penerbit')]);
            $mahasiswa->update(['tahun_buku' => $request->input('tahun')]);
            $mahasiswa->update(['lokasi' => $request->input('lokasi')]);
            $mahasiswa->update(['status' => $request->input('status')]);
            $mahasiswa->update(['cover' => $cover]);
        }  

      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $mahasiswa = \DB::table('bukus')->select('id_buku')->where('id_buku', $request->input('id_buku'));
        $cover = $request->input('cover');
        unlink(public_path().'/storage/upload/'.$cover);
        $mahasiswa->delete();

        return back();
    }



}
