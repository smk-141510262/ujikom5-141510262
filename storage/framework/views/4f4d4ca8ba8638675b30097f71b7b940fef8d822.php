<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Penggajian</div>
                <div class="panel-body">

<a href="<?php echo e(url('Penggajian/create')); ?>" class="btn btn-success form-control">Tambah Penggajian</a><br>
<center><?php echo e($penggajians->links()); ?></center><br>
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
<?php 
$no=1 ;
 ?>
<?php $__currentLoopData = $penggajians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $baru): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<?php 
    ;
 ?>
<tbody>
    <tr>
        <td><?php echo e($no++); ?></td>
        <td><img src="<?php echo e(asset('img/'.$baru->tunjangan_pegawai->pegawai->photo.'')); ?>" width="75" height="75" class="img-rounded img-responsive" alt="Responsive image"></td>
        <td><?php echo e($baru->tunjangan_pegawai->pegawai->User->name); ?></td>
        <td><?php echo e($baru->tunjangan_pegawai->pegawai->nip); ?></td>
        <td>
            <?php if($baru->tanggal_pengambilan == ""&&$baru->status_pengambilan == "0"): ?>
                Belum Diambil
            <?php elseif($baru->tanggal_pengambilan == ""||$baru->status_pengambilan == "0"): ?>
                Belum Diambil
        </td>
        <td>
            <a class="btn btn-success" href="<?php echo e(route('Penggajian.edit',$baru->id)); ?>">Ambil</a>
            <?php else: ?>
                Sudah Diambil / <?php echo e($baru->tanggal_pengambilan); ?>

            <?php endif; ?></b>
        </td>
        <td>
            <a class="btn btn-info" href="<?php echo e(route('Penggajian.show',$baru->id)); ?>">Rincian</a>
        </td>
        <td>
            <a class="btn btn-warning" href="<?php echo e(route('Penggajian.show',$baru->id)); ?>">Ubah </a>
        </td>
        <td>
            <?php echo Form::open(['method'=>'DELETE','route'=>['Penggajian.destroy',$baru->id]]); ?>

            <?php echo Form::submit('Delete',['class'=>'btn btn-danger']); ?>

            <?php echo Form::close(); ?>

        </td>
    </tr>
</tbody>
</thead>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</table>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>