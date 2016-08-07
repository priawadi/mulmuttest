<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered" id="diskon">
                        <thead> 
                            <tr> 
                                <th>#</th>
                                <th>Merk</th>
                                <th>Diskon</th>
                            </tr> 
                        </thead> 
                          <tbody>
                             <?php foreach($diskon as $index => $item): ?>
                            <tr> 
                                <th scope="row"><?php echo e($index + 1); ?></th> 
                                <td><?php echo e($item->merk); ?></td> 
                                <td><?php echo e($item->diskon); ?></td> 
                            </tr>
                            <?php endforeach; ?>   
                          </tbody>    
                    </table>
              </div>        
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>