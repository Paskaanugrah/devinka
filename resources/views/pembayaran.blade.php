@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <center><h1>PEMBAYARAN </h1></center></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <center>SETELAH MELAKUKAN PEMESANAN, SILAHKAN ANDA MEMVALIDASI DAN MEMBAYAR PESANAN ANDA DENGAN CARA LANGSUNG DATANG KE TEMPAT RENTAL KAMI <br>
                        Di <strong> Jl. Blimbingsari No. 9 Caturtunggal, Depok, Kota Yogyakarta 55161</strong><br>
                        SAMBIL MEMBAWA KARTU IDENTITAS DALAM KURUN WAKTU <strong>1x24JAM</strong>.<br>
                        JIKA <strong>TIDAK</strong>, MAKA PEMESANAN ANDA AKAN TERHAPUS.<BR>
                    UNTUK PEMBAYARAN SECARA TRANSFER DAPAT KE NO REKENING : <br>
                    <h4>MANDIRI : 137-00-2345463-8 A.N PASKA ANUGRAH ADIL</h4>
                    <h4>BNI : 7777-00-2312363-1 A.N INDRA WIRAWAN</h4> 
                    <h4>BRI : 9988-00-89787377-8 A.N MUHAMMAD DEVIAN </h4> 
                    <br>
                    TERIMA KASIH ATAS PERHATIANNYA</center>
                    
                </div>

            </div>
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
