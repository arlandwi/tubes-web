@extends('layouts.master')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-6">
				<div class="small-box bg-info">
					<div class="inner">
						<h3>{{$count}}</h3>
						<p>Total Buku</p>
					</div>	
					<div class="icon">
						<i class="fa fa-book nav-icon"></i>
					</div>
					<a href="{{url('buku')}}" class="small-box-footer">
						More Info
						<i class="fa fa-arrow-circle-right"></i>
					</a>	
					
				</div>
			</div>
		</div>
	</div>
  
@endsection
