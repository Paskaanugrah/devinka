@extends('layouts.app')

@section('logout')
<a href="{{ route('admin.logout') }}"
	onclick="event.preventDefault();
		document.getElementById('logout-form').submit();">
	Logout
</a>

<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection

@section('content')
<div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
<div class="container">
	<div class="row">
		<div class="col-md-12 ">
		<h1>Kelola Pemesanan</h1>
				@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
				@endif
				<div class="row">
					<div class="col-lg-12 margin-tb">
						<div class="pull-right mb-1">
							<a class="btn btn-success" href="{{ route('pemesanan.create') }}">Buat Pemesanan</a>
						</div>
					</div>
				</div>

				<br/>
				<table id="table_pemesanans" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>NIK</th>
							<th>Nomor Telepon</th>
							<th>Alamat</th>
							<th>Mobil</th>
							<th width="280px">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($pesan as $key => $pesan)
							<tr>
								<td>{{ ++$i }}</td>
								<td>{{ $pesan->name }}</td>
								<td>{{ $pesan->nik }}</td>
								<td>{{ $pesan->no_telp }}</td>
								<td>{{ $pesan->alamat }}</td>
								<td>{{ $pesan->mobil }}</td>
								<td>
									<a class="btn btn-info"
									href="{{ route('pemesanan.show',$pesan->id) }}">Detail</a>
									<a class="btn btn-primary"
									href="{{ route('pemesanan.edit',$pesan->id) }}">Edit</a>
									{!! Form::open(['method' => 'DELETE','route' =>
									['pemesanan.destroy', $pesan->id],'style'=>'display:inline']) !!}
									{!! Form::submit('Delete', ['class' => 'btn btn-danger'])
									!!}
									{!! Form::close() !!}
								</td>
								<!--  -->
							</tr>
						@endforeach
					</tbody>
				</table>
			
            @if ($pesan->count()==0)
            <tr>
                <td colspan="5">No data to display.</td>
            </tr>
            @endif
		</div>
	</div>
</div>
@endsection