<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\buku;

class bukucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = buku::all();
       return view('buku.index',compact('bukus'));
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
        $cover = $request->file('cover')->getClientOriginalName();
        $request->file('cover')->storeAs('public/upload', $cover);
        $buku = new buku;
        $buku->judul_buku = $judul;
        $buku->pengarang_buku = $pengarang;
        $buku->penerbit_buku = $penerbit;
        $buku->tahun_buku = $tahun;
        $buku->lokasi = $lokasi;
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
