@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Selamat Datang <strong>ADMIN</strong>! </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="admin/pemesanan"> <button type="button" class="btn btn-primary">
                        Kelola Pemesanan
                    </button>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
