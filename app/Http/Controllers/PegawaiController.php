<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\PegawaiModel;
use App\JabatanModel;
use App\GolonganModel;
use File;

class PegawaiController extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('HRD');
    }
    public function index()
    {
        //
        $pegawais=PegawaiModel::all();
        return view('pegawai.index', compact('pegawais'));
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
        return view('pegawai.create',compact('jabatans', 'golongans'));
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
        $this->validate($request,[
            'name' => 'required',
            'nip' => 'required|unique:pegawais,nip',
            'permission' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',

            ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'permission' => $request->get('permission'),
            'password' => bcrypt($request->get('password')),
        ]);

        //isi fiedl photo jika ada cover yang di upload
        if($request->hasFile('photo'))
        {
            $filename = null;
            //Mengambil file yang di upload
            $uploaded_photo = $request->file('photo');
            //mengambil extension file
            $extension = $uploaded_photo->getClientOriginalExtension();
            //membuat namma file random berikut extension
            $filename = md5(time()) . '.' . $extension;
            //menyimpan file ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_photo->move($destinationPath, $filename);
            //mengisi filed cover di book dengan filename yang baruyu dibuat

            $pegawai = new PegawaiModel;
            $pegawai->nip = $request->get('nip');
            $pegawai->user_id = $user->id;
            $pegawai->jabatan_id = $request->get('jabatan_id');
            $pegawai->golongan_id = $request->get('golongan_id');

            $pegawai->photo = $filename;
            $pegawai->save();
        }

        return redirect('Pegawai');
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
        $pegawais=PegawaiModel::find($id);
        return view('pegawai.read', compact('pegawais'));
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
        $pegawais=PegawaiModel::find($id);
        return view('pegawai.edit', compact('pegawais', 'jabatans', 'golongans'));
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
        
        $pegawais = PegawaiModel::find($id);
        if($request->hasFile('photo'))
        {
            $filename = null;
            $uploaded_photo = $request->file('photo');
            $extension = $uploaded_photo->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_photo->move($destinationPath, $filename);
            if($pegawais->photo){
                $old_photo =  $pegawais->photo;
                $filepath = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . $pegawais->photo;
                try{
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {

                }
                $pegawais->photo = $filename;
            }
            $pegawais->nip = $request->get('nip');
            $pegawais->jabatan_id = $request->get('jabatan_id');
            $pegawais->golongan_id = $request->get('golongan_id');
            $pegawais->save();
        }

            return redirect('Pegawai');
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
        PegawaiModel::find($id)->delete();
        return redirect('Pegawai');
    }
}
