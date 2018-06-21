@extends('layouts.app')

@section('content')

	  <div class="container">
	  	<div class="row" style="padding-left: 34%; width: auto; padding-right: 34% ;padding-top: 15%">
	  		<div class="col-sm-12">
	  			<form class="form-inline ml-3">
	  				<label >Cari Buku</label>
      				<div class="input-group input-group-sm">
        				<input class="form-control form-control-navbar" type="search" placeholder="Cari Buku" aria-label="Search" style="width: 300px" >
        				<div class="input-group-append">
          					<button class="btn btn-navbar" type="submit">
            					<i class="fa fa-search"></i>
          					</button>
        				</div>
      				</div>
    		</form>
	  		</div>
	  	</div>
	  </div>
	

	
@endsection