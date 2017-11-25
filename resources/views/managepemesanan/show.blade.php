@extends('layouts.app') 
@section('logout') 
	<a href="{{ route('admin.logout') }}" 
	onclick="event.preventDefault(); 
	document.getElementById('logout-form').submit();"> 
	Logout 
	</a>
	<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;"> 
	{{ csrf_field() }} 
	</form> 
@endsection 
@section('content') 
<div class="container"> 
	<div class="row"> 
		<div class="col-md-8 col-md-offset-2"> 
		<center><h1>Detail Pemesanan</h1> </center>
		<div class="col-xs-12 col-sm-12 col-md-12"> 
		<div class="form-group"> 
		<strong>Nama 	:</strong> 
			{{ $pesan->name }} 
		</div> 
		</div> 
		<div class="col-xs-12 col-sm-12 col-md-12"> 
		<div class="form-group"> 
		<strong>NIK 	:</strong> 
			{{ $pesan->nik }} 
		</div> 
		</div> 
		<div class="col-xs-12 col-sm-12 col-md-12"> 
		<div class="form-group"> 
		<strong>Nomor Telepon	:</strong> 
			{{ $pesan->no_telp }} 
		</div> 
		</div> 
		<div class="col-xs-12 col-sm-12 col-md-12"> 
		<div class="form-group"> 
		<strong>Alamat 	:</strong> 
			{{ $pesan->alamat }} 
		</div> 
		</div> 
		<div class="col-xs-12 col-sm-12 col-md-12"> 
		<div class="form-group"> 
		<strong>Mobil 	:</strong> 
			{{ $pesan->mobil }} 
		</div> 
		</div> 
		</div> 
	</div> 
</div> 
@endsection