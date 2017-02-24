@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lembur Pegawai</div>

                <div class="panel-body">
                    <a href="{{url('/LemburPegawai/create')}}" class="btn btn-success btn-block">Tambah Lembur Pegawai</a><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Lembur</td>
                                <td>Nama Pegawai</td>
                                <td>Jumlah Jam</td>
                                <td colspan="2">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($lemburpegawais as $baru)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $baru->kategori_lembur->kode_lembur }}</td>
                                    <td>{{ $baru->pegawai->User->name }}</td>
                                    <td>{{ $baru->jumlah_jam }}</td>
                                    <td><a href="{{route('LemburPegawai.edit',$baru->id)}}" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['LemburPegawai.destroy', $baru->id]]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
