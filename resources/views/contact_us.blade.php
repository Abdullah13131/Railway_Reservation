<?php
Session();

?>
@extends('layouts.layout')
@section('headers')
<link rel="stylesheet" href="{{ asset('css/contact_us.css')}}">
@endsection
@section('content')
<nav class="navbar navbar-expand-sm  navbar-light bg-light" style="box-shadow: 14px 14px 100px grey;">
	<a href=""><span><span style="color: teal; font-size: 30px; font-weight: bold;">Pakistan</span><span style="color:orange;font-size: 30px;">Railways</span><span style="color:grey;font-size: 30px;">.com</span></span></a>
	<button class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#navbar">
		<span class="navbar-toggler-icon ml-auto"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar">
		<ul class="navbar-nav nav-pills ml-auto text-center">
			<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="about">About</a></li>
			<li class="nav-item"><a class="nav-link active" href="contact_us">Contact</a></li>
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

<br><br>

<div class="row text-center">
	<div class="col-12">
		<h3 class="display-5">Contact us</h3>

	</div>
</div>
<div class="row text-center">
	<div class="col-12">
		<h3 class="display-5">Location Information</h3>
		
	</div>
</div>

<div class="row py-5">
	<div class="col-10 offset-2 col-sm-5 offset-sm-1">
		<h4>Our Address</h4>
		<p>4th Floor, Block D Pak.<br>
			Secretariat <br>
			Islamabad<br>
			+ (92-51) 9218515<br>
			+ (92-51) 9213170 <br>
			<a href="http://www.railways.gov.pk">http://www.railways.gov.pk</a> <br>
		<div class="btn-group">
			<button type="button" class="btn btn-primary"><i class="fa fa-phone" aria-hidden="true"></i> <br> Call</button>
			<button type="button" class="btn btn-info"><i class="fa fa-skype" aria-hidden="true"></i> Skype</button>
			<button type="button" class="btn btn-success"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email</button>
		</div>

		</button>

		</p>
	</div>
	<div class="col-10 offset-2 col-sm-5 offset-sm-1">
		<h4>Map of our Location</h4>
		<div id="map">
		<iframe style=" border-radius: 20px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6645.879607736361!2d73.04233992331929!3d33.60686630850513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df948eac366767%3A0x72f8a24384719a4a!2sRailway%20Rawalpindi%20Station%2C%20Rawalpindi%2C%20Punjab%2046000%2C%20Pakistan!5e0!3m2!1sen!2s!4v1656064184941!5m2!1sen!2s"
                    width="280" height="200" style="border:0;margin-right: 10px;" allowfullscreen="" loading="fast"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
</div>
<div class="row bg-light align-content-center col-12">
<div class="col-12">
		<h3 class="display-5" style="padding-left:20px;">Send us your feedback</h3>
	</div>
	<div class="col-12 offset-1 col-sm-5 offset-sm-1">
		<form action="/feedback" method="post" id="form" class="form">
			@csrf
			<div class="form-group">
				<label for="f_name">First Name</label>
				<input type="text" name="f_name" id="f_name" class="form-control" placeholder="e.g: Talha">
				<small>Error Message</small>
			</div>
			<div class="form-group">
				<label for="l_name">Last Name</label>
				<input type="text" name="l_name" id="l_name" class="form-control" placeholder="e.g: Asif">
				<small>Error Message</small>
			</div>
			<div class="form-group">
				<label for="tel">Contact tel</label>
				<input type="tel" name="tel" id="tel" class="form-control" placeholder="e.g: 0334-1234567">
				<small>Error Message</small>
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<input type="text" name="description" id="description" class="form-control">
				<small>Error Message</small>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success">
			</div>
			<div class="form-group">
				@isset($success)
					<p style="color: green">{{$success}}</p>
				@endisset
				@isset($fail)
					<p style="color: red">{{$fail}}</p>
				@endisset
			</div>

		</form>
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



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBv5kwLeQiUdY9ilRuYCjnOzzdjEVjsjGc&callback=initMap&libraries=&v=weekly" async></script>
<script type="module" src="{{ asset('js/form-validation/formValidationHelpers.js')}}"></script>
<script type="module" src="{{ asset('js/form-validation/contactUs.js')}}"></script>
<script src="{{ asset('js/Home.js')}}"></script>
@endsection