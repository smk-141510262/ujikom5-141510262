<?php

namespace App\Http\Controllers;

use Request;
use App\TunjanganModel;
use App\JabatanModel;
use App\GolonganModel;

class TunjanganController extends Controller
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
        $tunjangans=TunjanganModel::all();
        $jabatans=JabatanModel::all();
        $golongans=GolonganModel::all();
        return view('tunjangan.index', compact('tunjangans', 'jabatans', 'golongans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jabatans=JabatanModel::all();
        $golongans=GolonganModel::all();
        return view('tunjangan.create', compact('jabatans', 'golongans'));
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
        $tunjangans=Request::all();
        TunjanganModel::create($tunjangans);
        return redirect ('Tunjangan');
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
        $jabatans=JabatanModel::all();
        $golongans=GolonganModel::all();
        $tunjangans=TunjanganModel::find($id);
        return view('tunjangan.edit', compact('tunjangans', 'jabatans', 'golongans'));
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
        $tunjanganUpdate = Request::all();
        $tunjangans= TunjanganModel::find($id);
        $tunjangans->update($tunjanganUpdate);
        return redirect('Tunjangan');
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
        TunjanganModel::find($id)->delete();
        return redirect('Tunjangan');
    }
}
