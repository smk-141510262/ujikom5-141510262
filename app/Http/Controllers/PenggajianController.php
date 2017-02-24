<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PenggajianModel ;
use App\TunjanganPegawaiModel ;
use App\PegawaiModel ;
use App\TunjanganModel ;
use App\JabatanModel ;
use App\GolonganModel;
use App\KategoriLemburModel ;
use App\LemburPegawaiModel ;
use Input;
use Validator ;
use auth ;

class PenggajianController extends Controller
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
        $penggajians=PenggajianModel::paginate(3);
        return view('penggajian.index',compact('penggajians'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tunjangans=TunjanganPegawaiModel::paginate(10);
        return view('penggajian.create',compact('tunjangans'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penggajians=Input::all();
        $where=TunjanganPegawaiModel::where('id',$penggajians['tunjangan_pegawai_id'])->first();
        $wherepenggajian=PenggajianModel::where('tunjangan_pegawai_id',$where->id)->first();
        $wheretunjangan=TunjanganModel::where('id',$where->kode_tunjangan_id)->first();
        $wherepegawai=PegawaiModel::where('id',$where->pegawai_id)->first();
        $wherekategorilembur=KategoriLemburModel::where('jabatan_id',$wherepegawai->jabatan_id)->where('golongan_id',$wherepegawai->golongan_id)->first();
        $wherelemburpegawai=LemburPegawaiModel::where('pegawai_id',$wherepegawai->id)->first();
        $wherejabatan=JabatanModel::where('id',$wherepegawai->jabatan_id)->first();
        $wheregolongan=GolonganModel::where('id',$wherepegawai->golongan_id)->first();
        $penggajians=new PenggajianModel ;

        if (isset($wherepenggajian)) {
            $error=true ;
            $tunjangans=TunjanganPegawaiModel::paginate(10);
            return view('penggajian.create',compact('tunjangans','error'));
        }
        elseif (!isset($wherelemburpegawai)) {
            $nol=0 ;
            $penggajians->jumlah_jam_lembur=$nol;
            $penggajians->jumlah_uang_lembur=$nol ;
            $penggajians->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajians->total_gaji=($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
        $penggajians->tunjangan_pegawai_id=Input::get('tunjangan_pegawai_id');
        $penggajians->petugas_penerima=auth::user()->name ;
        $penggajians->status_pengambilan=Input::get('status_pengambilan');
        $penggajians->save();
        }
        elseif (!isset($wherelemburpegawai)||!isset($wherekategorilembur)) {
            $nol=0 ;
            $penggajians->jumlah_jam_lembur=$nol;
            $penggajians->jumlah_uang_lembur=$nol ;
            $penggajians->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajians->total_gaji=($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
        $penggajians->tunjangan_pegawai_id=Input::get('tunjangan_pegawai_id');
        $penggajians->petugas_penerima=auth::user()->name ;
        $penggajians->status_pengambilan=Input::get('status_pengambilan');
        $penggajians->save();
        }
        else{
            $penggajians->jumlah_jam_lembur=$wherelemburpegawai->jumlah_jam;
            $penggajians->jumlah_uang_lembur=$wherelemburpegawai->jumlah_jam*$wherekategorilembur->besaran_uang ;
            $penggajians->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajians->total_gaji=($wherelemburpegawai->jumlah_jam*$wherekategorilembur->besaran_uang)+($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
            $penggajians->tanggal_pengambilan =date('d-m-y');
            $penggajians->tunjangan_pegawai_id=Input::get('tunjangan_pegawai_id');
            $penggajians->petugas_penerima=auth::user()->name ;
            $penggajians->status_pengambilan=Input::get('status_pengambilan');
            $penggajians->save();
            }
            return redirect('Penggajian');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penggajians=PenggajianModel::find($id);
        return view('penggajian.read',compact('penggajians'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $gajis=PenggajianModel::find($id);
        $penggajians=new PenggajianModel ;
        $penggajians=array('status_pengambilan'=>1,'tanggal_pengambilan'=>date('y-m-d'));
        PenggajianModel::where('id',$id)->update($penggajians);
        return redirect('Penggajian');
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
        PenggajianModel::find($id)->delete();
        return redirect('Penggajian');
    }
}