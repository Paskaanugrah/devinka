@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> MEMBER Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat Datang! <strong> MEMBER DEVINKA </strong>!
                    
                </div>

            </div>
            <button type="button" class="btn btn-lg btn-primary-outline"><a href="pesanmobil">Pesan</a> </button>
        </div>
    </div>
</div>
@endsection

@section('logout') 
    <a href="{{ route('user.logout') }}" 
        onclick="event.preventDefault(); 
        document.getElementById('logout-form').submit();"> 
        Logout 
    </a> 
    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;"> 
        {{ csrf_field() }} 
    </form> 
@endsection
