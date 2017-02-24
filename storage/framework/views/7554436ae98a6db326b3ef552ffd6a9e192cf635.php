<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Pegawai</div>

                <div class="panel-body">
                    <a href="<?php echo e(url('/Pegawai/create')); ?>" class="btn btn-success btn-block">Tambah Pegawai</a><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Foto</td>
                                <td>NIP</td>
                                <td>Nama</td>
                                <td>Jabatan</td>
                                <td>Golongan</td>
                                <td colspan="3">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=1;
                             ?>
                            <?php $__currentLoopData = $pegawais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $baru): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><img src="<?php echo e(asset('img/'.$baru->photo.'')); ?>" width="75" height="75" class="img-rounded img-responsive" alt="Responsive image"></td>
                                    <td><?php echo e($baru->nip); ?></td>
                                    <td><?php echo e($baru->User->name); ?></td>
                                    <td><?php echo e($baru->jabatan->nama_jabatan); ?></td>
                                    <td><?php echo e($baru->golongan->nama_golongan); ?></td>
                                    <td><a href="<?php echo e(route('Pegawai.show',$baru->id)); ?>" class="btn btn-default">Lihat</a></td>
                                    <td><a href="<?php echo e(route('Pegawai.edit',$baru->id)); ?>" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    <?php echo Form::open(['method' => 'DELETE', 'route'=>['Pegawai.destroy', $baru->id]]); ?>

                                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>