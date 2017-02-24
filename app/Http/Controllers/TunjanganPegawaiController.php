<?php

namespace App\Http\Controllers;

use Request;
use App\TunjanganPegawaiModel;
use App\TunjanganModel;
use App\PegawaiModel;
use App\User;

class TunjanganPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('Bendahara');
    }

    public function index()
    {
        //
        $tunjanganpegawais=TunjanganPegawaiModel::all();
        $tunjangans=TunjanganModel::all();
        $pegawais=PegawaiModel::all();
        $users=User::all();
        return view('tunjanganpegawai.index', compact('tunjanganpegawais', 'tunjangans', 'pegawais', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tunjanganpegawais=TunjanganPegawaiModel::all();
        $tunjangans=TunjanganModel::all();
        $pegawais=PegawaiModel::all();
        $users=User::all();
        return view('tunjanganpegawai.create', compact('tunjanganpegawais', 'tunjangans', 'pegawais', 'users'));
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
        $tunjanganpegawais=request::all();
        TunjanganPegawaiModel::create($tunjanganpegawais);
        return redirect('TunjanganPegawai');
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
        $users=User::all();
        $tunjangans=TunjanganModel::all();
        $tunjanganpegawais=TunjanganPegawaiModel::find($id);
        $cobas=TunjanganPegawaiModel::all();
        $pegawais=PegawaiModel::all();
        return view('tunjanganpegawai.edit', compact('tunjanganpegawais', 'users', 'tunjangans', 'cobas', 'pegawais'));
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
        $tunpegupdate = Request::all();
        $tunjanganpegawais= TunjanganPegawaiModel::find($id);
        $tunjanganpegawais->update($tunpegupdate);
        return redirect('TunjanganPegawai');
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
        TunjanganPegawaiModel::find($id)->delete();
        return redirect('TunjanganPegawai');
    }
}
