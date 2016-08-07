@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <button onclick="goBack()" class="btn btn-warning btn-sm">Kembali</button>
                	<center><h3>Detail Customer</h3></center><br>
                    <table class="table table-bordered">
                        <tr> 
                            <th width="200px">Username</th>
                            <td>{{$customer->username}}</td>
                        </tr> 
                        <tr> 
                            <th width="200px">Password</th>
                            <td>{{$customer->password}}</td>
                        </tr>   
                        <tr> 
                            <th width="200px">Nama Lengkap</th>
                            <td>{{$customer->fullname}}</td>
                        </tr> 
                        <tr> 
                            <th width="200px">Nomor Telepon</th>
                            <td>{{$customer->phone}}</td>
                        </tr>   
                        <tr> 
                            <th width="200px">Email</th>
                            <td>{{$customer->email}}</td>
                        </tr> 
                        <tr> 
                            <th width="200px">Tempat Lahir</th>
                            <td>{{$customer->pob}}</td>
                        </tr>                           
                        <tr> 
                            <th width="200px">Tanggal Lahir</th>
                            <td>{{$customer->dob}}</td>
                        </tr> 
                        <tr> 
                            <th width="200px">Umur</th>
                            <td>{{$customer->age}}</td>
                        </tr>   
                        <tr> 
                            <th width="200px">Tanggal Teregistrasi</th>
                            <td>{{$customer->created_at}}</td>
                        </tr>                                               
                    </table>
              </div>

            </div>
        </div>
    </div>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
@endsection