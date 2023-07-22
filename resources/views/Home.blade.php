<?php
Session();

?>
@extends('layouts.layout')
@section('headers')
<link rel="stylesheet" href="{{ asset('css/Home_style.css')}}">
@endsection
@section('content')

<nav class="navbar navbar-expand-sm  navbar-dark bg-dark" style="box-shadow: 10px 10px 100px #EAE8FE;">
    <a href=""><span><span style="color: teal; font-size: 30px; font-weight: bold;">Pakistan</span><span style="color:orange;font-size: 30px;">Railways</span></span></a>
    <button class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon ml-auto"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav nav-pills ml-auto text-center">
            <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="contact_us">Contact</a></li>
            @if (Session()->has('user_id'))
                <li class="nav-item"><a class="nav-link" onclick="window.open('userdashboard');" style="cursor: pointer;">My Account</a></li>
            @else
                <li class="nav-item"><a class="nav-link" onclick="document.getElementById('id01').style.display='block'" style="cursor: pointer;">My Account</a></li>
            @endif

        </ul>
    </div>
    @if (Session()->has('user_id'))
    <a class="nav-link " id="navbarDropdown" role="button" data-toggle="dropdown" style="cursor: pointer;"><i class="fas fa-user "  style="font-size: 30px; margin:10px" style="width:auto; "></i></a>
    <span class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="/logout">Logout</a>
    </span>
    @else
        <a style="cursor: pointer;"><i class="fas fa-user" style="font-size: 30px; margin:10px" onclick="document.getElementById('id01').style.display='block'" style="width:auto; "></i></a>
    @endif
</nav>


<div class="row">
    <div class="col-12 banner">
        <span class="heading"> BUY TICKETS HERE...</span><br>
        <form action="/booking" method="post" class="form" id="form">
        @csrf
        <div class="row">
            <div class="col-12 py-4">
                <div class="form-group mr-2">
                    <label id="radio" class="mr-3"><input type="radio" name="trip_type" class="mr-1" value="one" required> One Way </label>
                    <label id="radio"><input type="radio" name="trip_type" value="two" class="mr-1"> Round Trip </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 search-form">

                    @csrf
                    <div class="form-group mr-2">
                        <legend>From : </legend>

                        <input type="text" class="form-control" id="from_station" name="from" placeholder="Type station name">
                        <small>Error Message</small>

                    </div>
                    <div class="form-group mr-2">
                        <legend> Tickets</legend>

                        <input type="text" class="form-control" id="to_station" name="to" placeholder="Enter no. of tickets">
                        <small>Error Message</small>
                    </div>
                    <div class="form-group mr-2">
                        <legend> To: </legend>

                        <input type="text" class="form-control" id="to_station" name="to" placeholder="Type station name">
                        <small>Error Message</small>
                    </div>
                    <div class="form-group mr-2">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-12 text-center" style="padding-top: 100px; margin-bottom: 40px;">
        <h2 class="heading">Follow These Steps to Buy Tickets</h2>
    </div>
</div>

<div class="row steps">
    <div class=" col-sm-3 offset-1 ">
        <img src="{{ asset('img/route_img.png')}}" alt="">
        <p>Choose your departure and arrival destination. Select dates of travel.</p>
    </div>
    <div class="col-12 col-sm-3 offset-1">
        <img src="{{ asset('img/buy_img.png')}}">
        <p> Select train, class of service, and number of tickets. Make a payment. </p>
    </div>
    <div class="col-12 col-sm-3 offset-1">
        <img src="{{ asset('img/station_img.png')}}">
        <p> Receive your train tickets and enjoy your trip. Make a payment. </p>
    </div>
</div>

<div class="row">
    <div class="col-12 text-center" style="padding-top: 100px;">
        <h2 class="heading">Popular Destinations</h2>
    </div>
</div>
<div class="row visit_img" style="padding-top: 50px;">
    <div class="col-12 col-sm-3 offset-1">
        <img src="{{ asset('img/lahore.jpg')}}" alt="">
        <h4 style="padding-top: 30px;">LAHORE</h4>
    </div>

    <div class="col-12 col-sm-3 offset-1">
        <img src="{{ asset('img/karachi.jpg')}}" alt="">
        <h4 style="padding-top: 30px;">KARACHI</h4>
    </div>

    <div class="col-12 col-sm-3 offset-1">
        <img src="{{ asset('img/islamabad.jpg')}}" alt="">
        <h4 style="padding-top: 30px;">ISLAMABAD</h4>
    </div>

    <div class="col-12 col-sm-3 offset-1">
        <img src="{{ asset('img/faisalabad.jpg') }}" alt="">
        <h4 style="padding-top: 30px;">FAISALABAD</h4>
    </div>

    <div class="col-12 col-sm-3 offset-1">
        <img src="{{ asset('img/multan.jpg')}}" alt="">
        <h4 style="padding-top: 30px;">MULTAN</h4>
    </div>

    <div class="col-12 col-sm-3 offset-1">
        <img src="{{ asset('img/havelian.jpg')}}" alt="">
        <h4 style="padding-top: 30px;">HAVELIAN - ABBOTTABAD</h4>
    </div>
</div>

<div id="id01" class="modal align-items-center">

    <form class="form-horizontal modal-content animate " action="/login" method="post">
        @csrf
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="{{ asset('img/avatar.jpg')}}" alt="Avatar" class="avatar">
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-12">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-12">
                <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password" required>                
                @if($errors->any())
                    <script>$("a .fa-user").click()</script>
                    <p style="color: red">{{ $errors->first() }}</p>
                @endif

            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-5 offset-1">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                <div class="col-5">
                    <button onclick="goto_signup();" class="btn btn-info">Sign Up</button>
                </div>
            </div>
        </div>
    </form>

</div>

<script type="module" src="{{ asset('js/form-validation/formValidationHelpers.js')}}"></script>
<script type="module" src="{{ asset('js/form-validation/homeForm.js')}}"></script>
<script src="{{ asset('js/Home.js')}}"></script>
@endsection