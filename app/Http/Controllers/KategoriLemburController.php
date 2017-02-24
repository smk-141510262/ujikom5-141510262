<?php

namespace App\Http\Controllers;

use Request;
use App\KategoriLemburModel;
use App\JabatanModel;
use App\GolonganModel;

class KategoriLemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('Admin');
    }
    public function index()
    {
        //
        $kategorilemburs=KategoriLemburModel::all();
        return view('kategori.index', compact('kategorilemburs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategorilemburs=KategoriLemburModel::all();
        $jabatans=JabatanModel::all();
        $golongans=GolonganModel::all();
        return view('kategori.create', compact('kategorilemburs', 'jabatans', 'golongans'));
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
        $kategorilemburs=request::all();
        KategoriLemburModel::create($kategorilemburs);
        return redirect('KategoriLembur');
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
        $kategorilemburs=KategoriLemburModel::find($id);
        $jabatans=JabatanModel::all();
        $golongans=GolonganModel::all();
        return view('kategori.edit', compact('kategorilemburs', 'jabatans', 'golongans'));
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
        $kategorilemburUpdate = Request::all();
        $kategorilemburs= KategoriLemburModel::find($id);
        $kategorilemburs->update($kategorilemburUpdate);
        return redirect('KategoriLembur');
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
        KategoriLemburModel::find($id)->delete();
        return redirect('KategoriLembur');
    }
}
