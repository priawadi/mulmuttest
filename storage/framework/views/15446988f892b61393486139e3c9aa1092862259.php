<?php $__env->startSection('content'); ?>
<script type="text/javascript">
    function show_modal(url, kuesioner)
    {
        form_delete.action = url;
        $('#delete-info').text(kuesioner);
        $('#modal-delete').modal('show');

    }
</script>

<div id="modal-delete" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <?php echo Form::open(array('url' => '', 'class' => 'form-horizontal', 'method' => 'delete', 'name' => 'form_delete')); ?>

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin akan menghapus data:</p>
                <b><p id="delete-info"></p></b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Hapus</button>
            </div>
        </div>
        <?php echo Form::close(); ?>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ul>
                    <?php foreach($errors->all() as $error): ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; ?>
                </ul>                

                <div class="panel-body">
                    <a href="<?php echo e('customer/tambah'); ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                    <br><br>
                    <table class="table table-bordered" id="customer">
                        <thead> 
                            <tr> 
                                <th>Username</th>
                                <th>Password</th>
                                <th>Nama</th> 
                                <th>Nomer Telepon</th> 
                                <th>Email</th> 
<!--                                 <th>Tempat Lahir</th> 
                                <th>Tanggal Lahir</th> 
                                <th>Usia</th> 
                                <th>Tanggal Ter-registrasi</th>  -->
                                <th>Action</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php foreach($customer as $index => $item): ?>
                            <tr> 
       <!--                          <th scope="row"><?php echo e($index + 1); ?></th> 
                                <td><?php echo e($item->username); ?></td> 
                                <td><?php echo e($item->password); ?></td> 
                                <td><?php echo e($item->fullname); ?></td> 
                                <td><?php echo e($item->phone); ?></td> 
                                <td><?php echo e($item->email); ?></td> 
                                <td><?php echo e($item->pob); ?></td> 
                                <td><?php echo e($item->dob); ?></td> 
                                <td><?php echo e($item->age); ?></td> 
                                <td><?php echo e($item->created_at); ?></td> 
                                <td>
                                    <a href="" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="<?php echo e(url('customer/edit/' . $item->id_customer)); ?>" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="<?php echo e(url('customer/lihat/' . $item->id_customer)); ?>" title="Lihat"><i class="glyphicon glyphicon-file"></i></a>
                                </td>  -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody> 
                    </table>
              </div>

            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'throw';
    $('#customer').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo route('datatables.data'); ?>',
        columns: [
             // { data: null, searchable: false, orderable: false, targets: 0 },
            { data: 'username', name: 'username' },
            { data: 'password', name: 'password' },
            { data: 'fullname', name: 'fullname' },
            { data: 'phone', name: 'phone' },
            { data: 'email', name: 'email' },
            { targets : [5], 
             render: function(data, type, full) {
                return '<a class="btn btn-danger btn-sm" onclick="show_modal(\'customer/hapus/'+ full.id +'\',\''+ full.fullname +'\')">' + 'Hapus' + '</a> <a class="btn btn-info btn-sm" href=customer/edit/' + full.id + '>' + 'Edit' + '</a> <a class="btn btn-primary btn-sm" href=customer/lihat/' + full.id + '>' + 'Detail' + '</a>';
            }}
        ],
    }); 
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>