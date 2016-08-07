@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
<!--                 	Raw data: <br>
                	<pre>{{print_r($raw_data)}}</pre> -->
                	Data pertama: {{$first_data->merk}} Rp {{$first_data->diskon}}<br>
                	Data terakhir: {{$last_data->merk}} Rp {{$last_data->diskon}} <br>
                	Data diskon tiap merk: <br>
                	<ul>
						@foreach ($discount_per_merk as $merk => $item)
	                        <li>{{$merk}} Rp {{round($item['avg_discount'])}}</li>
	                    @endforeach
                	</ul>
                	Diskon tertinggi dari kelima merk mobil tsb secara descending: <br>
					<ul>
						@foreach ($max_disc_per_merk as $merk => $discount)
	                        <li>{{$merk}} Rp {{$discount}}</li>
	                    @endforeach
                	</ul>
                	Data merk mobil yang paling banyak: {{$max_car['merk']}} {{$max_car['total']}} data<br>
                	Data merk mobil yang paling banyak: {{$min_car['merk']}} {{$min_car['total']}} data<br>
                	Adakah merk mobil yang tidak ter-insert ketika melakukan random 100 kali insert pada database: {{count($not_inserted_merk)? 'Ya': 'Tidak'}}
                	<ul>
						@foreach ($not_inserted_merk as $merk)
	                        <li>{{$merk}}</li>
	                    @endforeach
                	</ul>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
