@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Tunjangan Pegawai</div>

                <div class="panel-body">
                    <a href="{{url('/TunjanganPegawai')}}" class="btn btn-success btn-block">Kembali</a><br>
                    {!! Form::model($tunjanganpegawais,['method'=>'PATCH','route'=>['TunjanganPegawai.update',$tunjanganpegawais->id]])!!}
                        <div class="form-group">
                            <label for="kode_tunjangan_id" class="form-group">Kode Tunjangan</label>
                            <div class="form-group">
                                <select name="kode_tunjangan_id" class="form-control">
                                    <option value="{{ $tunjanganpegawais->tunjangan->id }}">Kode Tunjangan -- {{ $tunjanganpegawais->tunjangan->kode_tunjangan }}</option>
                                    @foreach($tunjangans as $baru)
                                    <option value="{{$baru->id}}">{{$baru->kode_tunjangan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pegawai_id" class="form-group">Nama Pegawai</label>
                            <div class="form-group">
                                <select name="pegawai_id" class="form-control" disabled>
                                    <option value="{{ $tunjanganpegawais->pegawai->User->name }}">Nama Pegawai -- {{ $tunjanganpegawais->pegawai->User->name }}</option>
                                    @foreach($pegawais as $baru)
                                    <option value="{{$baru->id}}">{{$baru->User->name}}</option>
                                    @endforeach
                                </select>
                            </div>
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
