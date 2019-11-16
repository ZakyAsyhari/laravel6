<?php

namespace App\Http\Controllers;

use App\barang;
use Illuminate\Http\Request;

class BarangController extends Controller
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
    public function index()
    {
        $data = barang::all();
        return view('barang',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resorce        = $request->file('gambar');
        $name           = $resorce->getClientOriginalName();
        $resorce->move(\base_path() ."/public/img", $name );

        $data = new barang;
        $data->nama_produk  = $request->nama;
        $data->keterangan   = $request->info;
        $data->kategori     = $request->kategori;
        $data->harga        = $request->harga;
        $data->qty          = $request->qty;
        $data->gambar       = $name;
        $data->save();
        return redirect()->route('barang.index')->with('alert-success','Data Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = barang::where('id', $id)->first();
        $data->nama_produk  = $request->nama;
        $data->keterangan   = $request->info;
        $data->kategori     = $request->kategori;
        $data->harga        = $request->harga;
        $data->qty          = $request->qty;
        $data->save();
        return redirect()->route('barang.index')->with('alert-success','Update data success');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = barang::where('id',$id)->first();
        $data->delete();
        return redirect()->route('barang.index')->with('alert-success','Delete data is succes');
    }
}
