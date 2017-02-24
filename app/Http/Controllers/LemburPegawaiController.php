<?php

namespace App\Http\Controllers;

use Request;
use App\LemburPegawaiModel;
use App\KategoriLemburModel;
use App\PegawaiModel;
use App\User;

class LemburPegawaiController extends Controller
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
        $lemburpegawais=LemburPegawaiModel::all();
        return view('lembur.index', compact('lemburpegawais'));
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
        $pegawais=PegawaiModel::all();
        return view('lembur.create', compact('kategorilemburs', 'pegawais'));
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
        $lemburpegawais=request::all();
        LemburPegawaiModel::create($lemburpegawais);
        return redirect('LemburPegawai');
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
        $lemburpegawais=LemburPegawaiModel::find($id);
        $kategorilemburs=KategoriLemburModel::all();
        $pegawais=PegawaiModel::all();
        $users=User::all();
        return view('lembur.edit', compact('lemburpegawais', 'kategorilemburs', 'pegawais', 'users'));
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
        $lemburpegawaiUpdate = Request::all();
        $lemburpegawais= LemburPegawaiModel::find($id);
        $lemburpegawais->update($lemburpegawaiUpdate);
        return redirect('LemburPegawai');
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
        LemburPegawaiModel::find($id)->delete();
        return redirect('LemburPegawai');
    }
}
