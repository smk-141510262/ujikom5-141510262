<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Data Golongan</div>

                <div class="panel-body">
                    <a href="<?php echo e(url('/Golongan/create')); ?>" class="btn btn-primary btn-block">Tambah Data Golongan</a><br>
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
                            <?php 
                            $i=1;
                             ?>
                            <?php $__currentLoopData = $golongans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $baru): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($baru->kode_golongan); ?></td>
                                    <td><?php echo e($baru->nama_golongan); ?></td>
                                    <td>Rp.<?php echo e(number_format($baru->besaran_uang)); ?>,-</td>
                                    <td><a href="<?php echo e(route('Golongan.edit',$baru->id)); ?>" class="btn btn-success">Ubah</a></td>
                                    <td>
                                    <?php echo Form::open(['method' => 'DELETE', 'route'=>['Golongan.destroy', $baru->id]]); ?>

                                    <?php echo Form::submit('Hapus', ['class' => 'btn btn-danger']); ?>

                                    <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>