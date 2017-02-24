@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Data Golongan</div>

                <div class="panel-body">
                    <a href="{{url('/Golongan/create')}}" class="btn btn-primary btn-block">Tambah Data Golongan</a><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Golongan</td>
                                <td>Nama Golongan</td>
                                <td>Besaran Uang</td>
                                <td colspan="2">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($golongans as $baru)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $baru->kode_golongan }}</td>
                                    <td>{{ $baru->nama_golongan }}</td>
                                    <td>Rp.{{ number_format($baru->besaran_uang) }},-</td>
                                    <td><a href="{{route('Golongan.edit',$baru->id)}}" class="btn btn-success">Ubah</a></td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['Golongan.destroy', $baru->id]]) !!}
                                    {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
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
