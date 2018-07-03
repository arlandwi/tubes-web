@extends('layouts.usermaster')

@section('content')

	 <div class="container-fluid">
	 	<div class="row">
	 		<div class="col-12">
	 			<div class="invoice p-3 mb-3">
	 				<label>Cari Buku</label>
	 				<form class="form-inline" action="{{url('/home')}}">
	 					<input class="form-control" type="search" name="search" id="search" placeholder="Masukkan Judul Buku" style="width: 500px">
	 					<div class="input-group-append">
	 						<button class="btn btn-navbar" type="submit">
	 							<i class="fa fa-search"></i>
	 						</button>
	 					</div>
	 				</form>
	 				<br>
	 				<table class="table table-hover">
						<tbody>
							<tr style="text-align: center;">
								<th>ID</th>
								<th>Judul Buku</th>
								<th>Cover Buku</th>
								<th>Pengarang</th>
								<th>Penerbit</th>
								<th>Tahun</th>
								<th>Lokasi Rak</th>
								<th>Status</th>
							</tr>

							@if($search === null)

							@foreach($list as $lis)
							<tr style="text-align: center;">
								<td>{{$lis->id_buku}}</td>
								<td>{{$lis->judul_buku}}</td>
								<td>
									<img src="{{asset('storage/upload/')}}/{{$lis->cover}}" style="width: 40px;height: 40px;">
								</td>
								<td>{{$lis->pengarang_buku}}</td>
								<td>{{$lis->penerbit_buku}}</td>
								<td>{{$lis->tahun_buku}}</td>
								<td>{{$lis->lokasi}}</td>
								<td>
									@if($lis->status === 'Ada')
									<button class="btn btn-block btn-success btn-sm" >{{$lis->status}}</button>
									@else
									<button class="btn btn-block btn-danger btn-sm">{{$lis->status}}</button>
									@endif
								</td>
								
							</tr>
							@endforeach

							@else
							@foreach($search as $sea)
							<tr style="text-align: center;">
								<td>{{$sea->id_buku}}</td>
								<td>{{$sea->judul_buku}}</td>
								<td>
									<img src="{{asset('storage/upload/')}}/{{$sea->cover}}" style="width: 40px;height: 40px;">
								</td>
								<td>{{$sea->pengarang_buku}}</td>
								<td>{{$sea->penerbit_buku}}</td>
								<td>{{$sea->tahun_buku}}</td>
								<td>{{$sea->lokasi}}</td>
								<td>
									@if($sea->status === 'Ada')
									<button class="btn btn-block btn-success btn-sm" >{{$sea->status}}</button>
									@else
									<button class="btn btn-block btn-danger btn-sm">{{$sea->status}}</button>
									@endif
								</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>	
	 			</div>
	 		</div>
	 	</div>
	 </div>

	
@endsection