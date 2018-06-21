@extends('layouts.master')

@section('header' , 'Buku')

@section('content')

	<div class="row">
		<div class="col-12">
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title">Daftar Buku</h3>
				</div>
				<div class="card-body table-responsive p-0">
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
								<th>Modify</th>
							</tr>
							@foreach($bukus as $buk)
							<tr style="text-align: center;">
								<td>{{$buk->id_buku}}</td>
								<td>{{$buk->judul_buku}}</td>
								<td>
									<img src="{{asset('storage/upload/')}}/{{$buk->cover}}" style="width: 40px;height: 40px;">
								</td>
								<td>{{$buk->pengarang_buku}}</td>
								<td>{{$buk->penerbit_buku}}</td>
								<td>{{$buk->tahun_buku}}</td>
								<td>{{$buk->lokasi}}</td>
								<td>
									@if($buk->status === 'Ada')
									<button class="btn btn-block btn-success btn-sm" >{{$buk->status}}</button>
									@else
									<button class="btn btn-block btn-danger btn-sm">{{$buk->status}}</button>
									@endif
								</td>
								<td>
									<button type="button" class="btn btn-outline-info btn-sm" data-id_buku="{{$buk->id_buku}}"  data-judul="{{$buk->judul_buku}}" data-pengarang="{{$buk->pengarang_buku}}" data-penerbit="{{$buk->penerbit_buku}}" data-tahun="{{$buk->tahun_buku}}" data-lokasi="{{$buk->lokasi}}" data-toggle="modal" data-target="#edit">
									  Edit
									</button>

									<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete" data-id_buku="{{$buk->id_buku}}" data-cover="{{$buk->cover}}">
									  Delete
									</button>

							</td>
							</tr>
							@endforeach
						</tbody>
					</table>

					<div class="card-footer">
					<!-- Button Modal -->
					<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#myModal">
					  Insert a Book
					</button>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					      	<h4 class="modal-title" id="myModalLabel">Tambahkan Buku</h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					      </div>
					      <div class="modal-body">
					        <div class="card card-primary">
					        	<form action="{{route('buku.store')}}" method="post" enctype="multipart/form-data">
					        		<div class="card-body">
					        			<div class="form-group">
					        				<label>Judul Buku</label>
					        				<input class="form-control" type="text" name="judul" id="judul" placeholder="Masukkan Judul Buku">
					        			</div>

					        			<div class="form-group">
					        				<label>Pengarang</label>
					        				<input class="form-control" type="text" name="pengarang" id="pengarang" placeholder="Masukkan Pengarang Buku">
					        			</div>

					        			<div class="form-group">
					        				<label>Penerbit</label>
					        				<input class="form-control" type="text" name="penerbit" id="penerbit" placeholder="Masukkan Penerbit Buku">
					        			</div>

					        			<div class="form-group">
					        				<label>Tahun</label>
					        				<input class="form-control" type="text" name="tahun" id="tahun" placeholder="Masukkan Tahun">
					        			</div>

					        			<div class="form-group">
					        				<label>Lokasi Rak</label>
					        				<input class="form-control" type="text" name="lokasi" id="lokasi" placeholder="Masukkan Lokasi Rak Buku">
					        			</div>

					        			<div class="form-group">
					        				<label>Status</label>
					        				<select class="form-control" name="status" id="status">
					        					<option>Ada</option>
					        					<option>Dipinjam</option>
					        				</select> 
					        			</div>

					        			<div class="form-group">
					        				<label>Cover Buku</label>
					        				<div class="custom-file">
					        					<input type="file" name="cover" class="custom-file-input">
												<label class="custom-file-label">Upload Cover Buku</label>
												<input type="hidden" name="_token" value="{{ csrf_token()}}">
					        				</div>
					        			</div>
					        		
					        		</div>

					        		<div class="card-footer">
					        			<button type="submit" class="btn btn-outline-success btn-sm">Tambahkan Buku</button>

					        			 <button type="button" class="btn btn-outline-danger btn-sm float-right" data-dismiss="modal">Close</button>
					        		</div>
					        		
					        	</form>
					        	
					        </div>
					      </div>
					    </div>
					  </div>
					</div>

					<!--modal edit-->
						<!-- Modal -->
					<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					      	<h4 class="modal-title" id="myModalLabel">Edit Buku</h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					      </div>
					      <div class="modal-body">
					        <div class="card card-primary">
					        	<form action="{{route('buku.update','update')}}" method="post" enctype="multipart/form-data">
					        		{{method_field('patch')}}
					        		<div class="card-body">
					        			<div class="form-group">
					        				<input class="form-control" type="hidden" name="id_buku" id="id_buku" value="">
					        			</div>

					        			<div class="form-group">
					        				<label>Judul Buku</label>
					        				<input class="form-control" type="text" name="judul" id="judul" placeholder="Masukkan Judul Buku">
					        			</div>

					        			<div class="form-group">
					        				<label>Pengarang</label>
					        				<input class="form-control" type="text" name="pengarang" id="pengarang" placeholder="Masukkan Pengarang Buku">
					        			</div>

					        			<div class="form-group">
					        				<label>Penerbit</label>
					        				<input class="form-control" type="text" name="penerbit" id="penerbit" placeholder="Masukkan Penerbit Buku">
					        			</div>

					        			<div class="form-group">
					        				<label>Tahun</label>
					        				<input class="form-control" type="text" name="tahun" id="tahun" placeholder="Masukkan Tahun">
					        			</div>

					        			<div class="form-group">
					        				<label>Lokasi Rak</label>
					        				<input class="form-control" type="text" name="lokasi" id="lokasi" placeholder="Masukkan Lokasi Rak Buku">
					        			</div>

					        			<div class="form-group">
					        				<label>Status</label>
					        				<select class="form-control" name="status" id="status">
					        					<option>Ada</option>
					        					<option>Dipinjam</option>
					        				</select> 
					        			</div>

					        			<div class="form-group">
					        				<label>Cover Buku</label>
					        				<div class="custom-file">
					        					<input type="file" name="cover" class="custom-file-input">
												<label class="custom-file-label">Upload Cover Buku</label>
												<input type="hidden" name="_token" value="{{ csrf_token()}}">
					        				</div>
					        			</div>
					        		
					        		</div>

					        		<div class="card-footer">
					        			<button type="submit" class="btn btn-outline-success btn-sm">Edit Buku</button>

					        			 <button type="button" class="btn btn-outline-danger btn-sm float-right" data-dismiss="modal">Close</button>
					        		</div>
					        		
					        	</form>
					        	
					        </div>
					      </div>
					    </div>
					  </div>
					</div>
					<!--end modal-->


					<!--modal delete-->
					<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					      	<h4 class="modal-title" id="myModalLabel">Edit Buku</h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					      </div>
					      <div class="modal-body">
					        <div class="card card-primary">
					        	<form action="{{route('buku.destroy','destroy')}}" method="post" enctype="multipart/form-data">
					        		{{method_field('delete')}}
					        		{{csrf_field()}}
					        		<div class="card-body">
					        			<div class="form-group">
					        				<input class="form-control" type="hidden" name="id_buku" id="id_buku" value="">
					        				<input class="form-control" type="hidden" name="cover" id="cover" value="">
					        				<p>Apakah Anda Yakin?</p>
					        			</div>

					        		
					        		</div>

					        		<div class="card-footer">
					        			<button type="submit" class="btn btn-outline-danger btn-sm">Hapus Buku</button>

					        			 <button type="button" class="btn btn-outline-primary btn-sm float-right" data-dismiss="modal">Close</button>
					        		</div>
					        		
					        	</form>
					        	
					        </div>
					      </div>
					    </div>
					  </div>
					</div>
					<!--end modal-->




				</div>
			</div>
			
		</div>
		
	</div>

@endsection