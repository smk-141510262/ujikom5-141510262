@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Lembur Pegawai</div>

                <div class="panel-body">
                    <a href="{{url('/LemburPegawai')}}" class="btn btn-success btn-block">Kembali</a><br>
                    {!! Form::open(['url'=>'LemburPegawai'])!!}
                    <label>Kode Lembur</label>
                    <select name="kode_lembur_id" class="form-control" required>
                        <option value="">Pilih Kode Lembur</option>
                        @foreach($kategorilemburs as $baru)
                        <option value="{{$baru->id}}">{{$baru->kode_lembur}}</option>
                        @endforeach
                    </select><br>
                    <label>Nama Pegawai</label>
                    <select name="pegawai_id" class="form-control" required>
                        <option value="">Pilih Nama Pegawai</option>
                        @foreach($pegawais as $baru)
                        <option value="{{$baru->id}}">{{$baru->user->name}}</option>
                        @endforeach
                    </select><br>
                    <div class="form-group">
                        {!! Form::label('Jumlah Jam','Jumlah_jam')!!}
                        {!! Form::number('jumlah_jam',null,['class'=>'form-control', 'required'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('save',['class'=>'btn btn-success form-control'])!!}
                    </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
