@extends('layouts.master')

@section('content')
  <h1>Welcome to Rune Hotel!</h1>
  <p>Dear Valued Guests,</p>
  <p>We are thrilled to have you with us! Our dedicated team is here to ensure your stay is comfortable and enjoyable. Explore our amenities, indulge in our exquisite dining options, and don’t hesitate to reach out if you need assistance. We hope you create wonderful memories during your time here!</p>
  <p>Enjoy your stay!</p>
  
  <img src="https://content.skyscnr.com/available/1098093964/1098093964_WxH.jpg" alt="Rune Hotel" class="img-fluid mt-4">
@endsection

@section('sidebar')
  @include('components.sidebar_home2')
@endsection
