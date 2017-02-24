@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Lembur Pegawai</div>

                <div class="panel-body">
                    <a href="{{url('/LemburPegawai')}}" class="btn btn-success btn-block">Kembali</a><br>
                    {!! Form::model($lemburpegawais,['method'=>'PATCH','route'=>['LemburPegawai.update',$lemburpegawais->id]])!!}
                        <div class="form-group">
                            <label for="kode_lembur_id" class="form-group">Kode Lembur</label>
                            <div class="form-group">
                                <select name="kode_lembur_id" class="form-control">
                                    <option value="{{ $lemburpegawais->id }}">kode Lembur -- {{ $lemburpegawais->kategori_lembur->kode_lembur }}</option>
                                    @foreach($kategorilemburs as $baru)
                                    <option value="{{$baru->id}}">{{$baru->kode_lembur}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pegawai_id" class="form-group">Nama Pegawai</label>
                            <div class="form-group">
                                <select name="pegawai_id" class="form-control">
                                    <option value="{{ $lemburpegawais->id }}">Nama Pegawai -- {{ $lemburpegawais->pegawai->User->name }}</option>
                                    @foreach($pegawai as $baru)
                                    <option value="{{$baru->id}}">{{$baru->user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Jumlah Jam','Jumlah Jam')!!}
                            {!! Form::number('jumlah_jam',null,['class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('update',['class'=>'btn btn-success form-control'])!!}
                        </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
