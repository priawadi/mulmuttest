<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
<!--                 	Raw data: <br>
                	<pre><?php echo e(print_r($raw_data)); ?></pre> -->
                	Data pertama: <?php echo e($first_data->merk); ?> Rp <?php echo e($first_data->diskon); ?><br>
                	Data terakhir: <?php echo e($last_data->merk); ?> Rp <?php echo e($last_data->diskon); ?> <br>
                	Data diskon tiap merk: <br>
                	<ul>
						<?php foreach($discount_per_merk as $merk => $item): ?>
	                        <li><?php echo e($merk); ?> Rp <?php echo e(round($item['avg_discount'])); ?></li>
	                    <?php endforeach; ?>
                	</ul>
                	Diskon tertinggi dari kelima merk mobil tsb secara descending: <br>
					<ul>
						<?php foreach($max_disc_per_merk as $merk => $discount): ?>
	                        <li><?php echo e($merk); ?> Rp <?php echo e($discount); ?></li>
	                    <?php endforeach; ?>
                	</ul>
                	Data merk mobil yang paling banyak: <?php echo e($max_car['merk']); ?> <?php echo e($max_car['total']); ?> data<br>
                	Data merk mobil yang paling banyak: <?php echo e($min_car['merk']); ?> <?php echo e($min_car['total']); ?> data<br>
                	Adakah merk mobil yang tidak ter-insert ketika melakukan random 100 kali insert pada database: <?php echo e(count($not_inserted_merk)? 'Ya': 'Tidak'); ?>

                	<ul>
						<?php foreach($not_inserted_merk as $merk): ?>
	                        <li><?php echo e($merk); ?></li>
	                    <?php endforeach; ?>
                	</ul>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>