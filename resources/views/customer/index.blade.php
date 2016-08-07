@extends('layouts.app')

@section('content')
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
        {!! Form::open(array('url' => '', 'class' => 'form-horizontal', 'method' => 'delete', 'name' => 'form_delete')) !!}
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
        {!! Form::close() !!}
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
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>                

                <div class="panel-body">
                    <a href="{{'customer/tambah'}}" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
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
                            @foreach ($customer as $index => $item)
                            <tr> 
       <!--                          <th scope="row">{{ $index + 1 }}</th> 
                                <td>{{$item->username}}</td> 
                                <td>{{$item->password}}</td> 
                                <td>{{$item->fullname}}</td> 
                                <td>{{$item->phone}}</td> 
                                <td>{{$item->email}}</td> 
                                <td>{{$item->pob}}</td> 
                                <td>{{$item->dob}}</td> 
                                <td>{{$item->age}}</td> 
                                <td>{{$item->created_at}}</td> 
                                <td>
                                    <a href="" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="{{url('customer/edit/' . $item->id_customer)}}" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="{{url('customer/lihat/' . $item->id_customer)}}" title="Lihat"><i class="glyphicon glyphicon-file"></i></a>
                                </td>  -->
                            </tr>
                            @endforeach
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
        ajax: '{!! route('datatables.data') !!}',
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
@endsection
