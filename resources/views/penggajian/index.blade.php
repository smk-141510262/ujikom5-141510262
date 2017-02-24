@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Penggajian</div>
                <div class="panel-body">

<a href="{{url('Penggajian/create')}}" class="btn btn-success form-control">Tambah Penggajian</a><br>
<center>{{$penggajians->links()}}</center><br>
<table class="table table-hover table-bordered">
<thead>
    <tr>
        <td>No</td>
        <td>Photo</td>
        <td>Nama Pegawai</td>
        <td>NIP</td>
        <td colspan="2">Status Pengambilan</td>
        <td colspan="3">Pilihan</td>
    </tr>
@php
$no=1 ;
@endphp
@foreach($penggajians as $baru)
@php
    ;
@endphp
<tbody>
    <tr>
        <td>{{$no++}}</td>
        <td><img src="{{asset('img/'.$baru->tunjangan_pegawai->pegawai->photo.'')}}" width="75" height="75" class="img-rounded img-responsive" alt="Responsive image"></td>
        <td>{{$baru->tunjangan_pegawai->pegawai->User->name}}</td>
        <td>{{$baru->tunjangan_pegawai->pegawai->nip}}</td>
        <td>
            @if($baru->tanggal_pengambilan == ""&&$baru->status_pengambilan == "0")
                Belum Diambil
            @elseif($baru->tanggal_pengambilan == ""||$baru->status_pengambilan == "0")
                Belum Diambil
        </td>
        <td>
            <a class="btn btn-success" href="{{route('Penggajian.edit',$baru->id)}}">Ambil</a>
            @else
                Sudah Diambil / {{$baru->tanggal_pengambilan}}
            @endif</b>
        </td>
        <td>
            <a class="btn btn-info" href="{{route('Penggajian.show',$baru->id)}}">Rincian</a>
        </td>
        <td>
            <a class="btn btn-warning" href="{{route('Penggajian.show',$baru->id)}}">Ubah </a>
        </td>
        <td>
            {!!Form::open(['method'=>'DELETE','route'=>['Penggajian.destroy',$baru->id]])!!}
            {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
            {!!Form::close()!!}
        </td>
    </tr>
</tbody>
</thead>
@endforeach
</table>
</div>
</div>
</div>
</div>
@endsection