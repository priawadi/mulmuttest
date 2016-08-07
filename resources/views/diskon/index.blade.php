@extends('layouts.app')

@section('content')
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
                             @foreach ($diskon as $index => $item)
                            <tr> 
                                <th scope="row">{{ $index + 1 }}</th> 
                                <td>{{$item->merk}}</td> 
                                <td>{{$item->diskon}}</td> 
                            </tr>
                            @endforeach   
                          </tbody>    
                    </table>
              </div>        
            </div>
        </div>
    </div>
</div>

@endsection
