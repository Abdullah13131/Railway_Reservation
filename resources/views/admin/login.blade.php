<?php
Session();

?>
@extends('layouts.layout')
@section('headers')
<link rel="stylesheet" href="{{ asset('css/signup.css')}}">
@endsection
@section('content')
<nav class="navbar navbar-expand-sm  navbar-dark bg-dark" style="box-shadow: 10px 10px 100px grey;">
    <a href=""><span><span style="color: teal; font-size: 30px; font-weight: bold;">Pakistan</span><span style="color:orange;font-size: 30px;">Railways</span></span></a>
    <button class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon ml-auto"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav nav-pills ml-auto text-center">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="contact_us">Contact</a></li>
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

<div id="background">
    <img src="{{ asset('img/railway_background.jpg')}}" alt="">
</div>
<div class="container ">
    <div class="row">
        <div class="col-12 col-sm-5 offset-sm-3 text-center">

            <form action="/admin/register" method="post" class="signup-content form" id="form" autocomplete="off">
                @csrf
                <div class="form-group py-2">
                    <h3 class="py-3"><b>LOGIN IN</b></h3>
                    <input type="text" name="f_name" id="f_name" class="form-control" placeholder="Your First Name">
                    <small>Error Message</small>
                </div>
                <div class="form-group py-2">
                    <input type="text" name="l_name" id="l_name" class="form-control" placeholder="Your Last Name">
                    <small>Error Message</small>
                </div>
                <div class="form-group py-2">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
                    <small>Error Message</small>
                </div>

                <div class="form-group py-2">

                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <small>Error Message</small>
                </div>
                <div class="form-group py-2">
                    <input type="password" name="repeat_password" id="repeat_password" class="form-control" placeholder="Repeat your Password">
                    <small>Error Message</small>
                </div>
                <div class="form-group py-2">
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>
            </form>

        </div>

    </div>
</div>

<div id="id01" class="modal align-items-center">

    <form class="form-horizontal modal-content animate " method="post" action="/admin/login">
        @csrf
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="{{ asset('img/avatar.jpg')}}" alt="Avatar" class="avatar">
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-12">
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-12">
                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password" required>
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
<script type="module" src="{{ asset('js/form-validation/signupForm.js')}}"></script>
<script src="{{ asset('js/Home.js')}}"></script>
@endsection