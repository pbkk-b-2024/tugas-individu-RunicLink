@extends('layouts.admin')

@section('content')
    <h1>Pertemuan 1</h1><br>
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Routing</h5>
                    <a href="{{ url('/basic') }}" style="color: blue; text-decoration: none;">Basic Routing</a><br>
                    <a href="{{ url('/tes123') }}" style="color: blue; text-decoration: none;">Fallback Routing</a><br>
                    <a href="{{ url('/parameter/par') }}" style="color: blue; text-decoration: none;">Parameter Routing</a><br>
                    <a href="{{ url('/named') }}" style="color: blue; text-decoration: none;">Named Routing</a><br>
                    <a href="{{ url('/group') }}" style="color: blue; text-decoration: none;">Group Routing</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">n Bilangan</h5>
                    <a href="{{ url('/ganjilgenap') }}" style="color: blue; text-decoration: none;">Ganjil Genap</a><br>
                    <a href="{{ url('/fibonacci') }}" style="color: blue; text-decoration: none;">Fibonacci</a><br>
                    <a href="{{ url('/prima') }}" style="color: blue; text-decoration: none;">Prima</a><br>
                </div>
            </div>
        </div>
    </div>
@endsection
