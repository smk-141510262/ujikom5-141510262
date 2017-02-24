@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Kategori Lembur</div>

                <div class="panel-body">
                    <a href="{{url('/KategoriLembur/create')}}" class="btn btn-success btn-block">Tambah Kategori Lembur</a><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Lembur</td>
                                <td>Nama Jabatan</td>
                                <td>Nama Golongan</td>
                                <td>Besaran Uang</td>
                                <td colspan="2">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($kategorilemburs as $baru)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $baru->kode_lembur }}</td>
                                    <td>{{ $baru->Jabatan->nama_jabatan }}</td>
                                    <td>{{ $baru->Golongan->nama_golongan }}</td>
                                    <td>Rp. {{ number_format($baru->besaran_uang) }},-</td>
                                    <td><a href="{{route('KategoriLembur.edit',$baru->id)}}" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['KategoriLembur.destroy', $baru->id]]) !!}
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
@endsection
