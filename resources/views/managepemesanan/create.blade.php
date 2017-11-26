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
<h1>Buat Pemesanan Baru</h1> 
@if (count($errors) > 0) 
<div class="alert alert-danger"> 
<strong>Sorry!</strong> Something wrong with your input data.<br><br> 
<ul> 
@foreach ($errors->all() as $error) 
<li>{{ $error }}</li> 
@endforeach 
</ul> 
</div> 
@endif 
{!! Form::open(array('route' => 'pemesanan.store','method'=>'POST')) !!} 
<div class="row"> 
<div class="col-xs-12 col-sm-12 col-md-12"> 
<div class="form-group"> 
<strong>Nama:</strong> 
{!! Form::text('name', null, array('placeholder' => 'Nama','class' => 'form-control')) !!} 
</div> 
</div> 
<div class="col-xs-12 col-sm-12 col-md-12"> 
<div class="form-group"> 
<strong>NIK: </strong> 
{!! Form::text('nik', null, array('placeholder' => 'Nomor Induk Kependudukan','class' => 'form-control')) !!} 
</div> 
</div> 
<div class="col-xs-12 col-sm-12 col-md-12"> 
<div class="form-group"> 
<strong>Nomor Telepon:</strong> 
{!! Form::text('no_telp', null, array('placeholder' => 'Nomor Telepon Yang Aktif','class' => 'form-control')) !!} 
</div> 
</div> 
<div class="col-xs-12 col-sm-12 col-md-12"> 
<div class="form-group"> 
<strong>Alamat:</strong> 
{!! Form::text('alamat', null, array('placeholder' => 'Alamat','class' => 'form-control')) !!} 
</div> 
</div> 
<div class="col-xs-12 col-sm-12 col-md-12"> 
<div class="form-group"> 
<strong>Mobil :</strong> 
{!! 
	Form::select('mobil', 
	['Avanza' => 'Avanza', 'Xenia' => 'Xenia', 'Honda Mobilio' => 'Honda Mobilio', 'Honda jazz' => 'Honda Jazz'],
	 null, ['placeholder' => '-	- Pilih Mobil Anda -	-']);
 !!} 
</div> 
</div> 
<div class="col-xs-12 col-sm-12 col-md-12 text-center"> 
<button type="submit" class="btn btn-primary">Submit</button> 
</div> 
</div> 
{!! Form::close() !!} 
</div> 
</div> 
</div> 
@endsection 