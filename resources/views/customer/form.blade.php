@extends('layouts.app')
<link href="{!! asset('bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Data</div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <div class="panel-body">
                    {!! Form::open(array('url' => $action, 'class' => 'form-horizontal', 'method' => $method)) !!}
                        <div class="form-group">
                            {{
                                Form::label(
                                    'username', 
                                    'Username', 
                                    [
                                        'class' => 'col-sm-2 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-6">
                                {{
                                    Form::text(
                                        'username', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Username'
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'password', 
                                    'Password', 
                                    [
                                        'class' => 'col-sm-2 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-6">
                                {{
                                    Form::text(
                                        'password', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Password'
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'fullname', 
                                    'Nama Lengkap', 
                                    [
                                        'class' => 'col-sm-2 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-6">
                                {{
                                    Form::text(
                                        'fullname', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Nama Lengkap'
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'phone', 
                                    'Nomor Telepon', 
                                    [
                                        'class' => 'col-sm-2 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-6">
                                {{
                                    Form::text(
                                        'phone', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Nomor Telepon'
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'email', 
                                    'Email', 
                                    [
                                        'class' => 'col-sm-2 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-6">
                                {{
                                    Form::email(
                                        'email', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Email'
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'pob', 
                                    'Tempat Lahir', 
                                    [
                                        'class' => 'col-sm-2 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-6">
                                {{
                                    Form::text(
                                        'pob', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Tempat Lahir'
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'dob', 
                                    'Tanggal Lahir', 
                                    [
                                        'class' => 'col-sm-2 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-6">
                                {{
                                    Form::text(
                                        'dob', 
                                        '', 
                                        [
                                            'class'       => 'form-control datepicker',
                                            'placeholder' => 'Tanggal Lahir'
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::label(
                                    'age', 
                                    'Umur', 
                                    [
                                        'class' => 'col-sm-2 control-label'
                                    ]
                                )
                            }}
                        
                            <div class="col-sm-6">
                                {{
                                    Form::text(
                                        'age', 
                                        '', 
                                        [
                                            'class'       => 'form-control',
                                            'placeholder' => 'Umur'
                                        ]
                                    )
                                }}
                            </div>
                        </div>
                      

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <a href="{{ url('customer') }}" class="btn btn-link btn-sm">Batal</a>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                      </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>
@endsection
