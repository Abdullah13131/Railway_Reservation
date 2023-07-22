<?php
Session();
?>
@extends('layouts.layout')
@section('headers')
    <link rel="stylesheet" href="{{ asset('css/Home_style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection
@section('content')
    <nav class="navbar navbar-expand-sm  navbar-dark bg-dark" style="box-shadow: 10px 10px 100px grey;">
        <a href=""><span><span style="color: teal; font-size: 30px; font-weight: bold;">Pakistan</span><span
                    style="color:orange;font-size: 30px;">Railways</span></span></a>
        <button class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#navbar">
            <span class="navbar-toggler-icon ml-auto"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav nav-pills ml-auto text-center">
                <li class="nav-item"><a class="nav-link" href="Home">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="contact_us">Contact</a></li>
                @if (Session()->has('user_id'))
                    <li class="nav-item"><a class="nav-link" onclick="window.open('userdashboard');"
                            style="cursor: pointer;">My Account</a></li>
                @else
                    <li class="nav-item"><a class="nav-link"
                            onclick="document.getElementById('id01').style.display='block'" style="cursor: pointer;">My
                            Account</a></li>
                @endif
            </ul>
        </div>
        @if (Session()->has('user_id'))
            <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" style="cursor: pointer;"><i
                    class="fas fa-user " style="font-size: 30px;" style="width:auto;"></i></a>
            <span class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="/logout">Logout</a>
            </span>
        @else
            <a style="cursor: pointer;"><i class="fas fa-user" style="font-size: 30px; margin:10px"
                    onclick="document.getElementById('id01').style.display='block'" style="width:auto; "></i></a>
        @endif
    </nav>


    <!-- About Us Section -->
    <section class="white-section" id="about">

        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="about-us">
                    <h1>About Us</h1>
                    <p>Lorem IpsumExercitation esse qui quis magna consequat ut ad tempor deserunt est. Pariatur consequat
                        officia esse sunt velit est irure commodo eiusmod irure magna occaecat ea ipsum. Ut consectetur nisi
                        magna culpa id incididunt quis eiusmod ullamco exercitation. Aliqua reprehenderit sit commodo esse
                        nisi qui incididunt adipisicing quis consectetur in est laboris. Do non ex voluptate mollit Lorem
                        qui.
                        Lorem IpsumExercitation esse qui quis magna consequat ut ad tempor deserunt est. Pariatur consequat
                        officia esse sunt velit est irure commodo eiusmod irure magna occaecat ea ipsum. Ut consectetur nisi
                        magna culpa id incididunt quis eiusmod ullamco exercitation. Aliqua reprehenderit sit commodo esse
                        nisi qui incididunt adipisicing quis consectetur in est laboris. Do non ex voluptate mollit Lorem
                        qui.
                        Lorem IpsumExercitation esse qui quis magna consequat ut ad tempor deserunt est. Pariatur consequat
                        officia esse sunt velit est irure commodo eiusmod irure magna occaecat ea ipsum. Ut consectetur nisi
                        magna culpa id incididunt quis eiusmod ullamco exercitation. Aliqua reprehenderit sit commodo esse
                        nisi qui incididunt adipisicing quis consectetur in est laboris. Do non ex voluptate mollit Lorem
                        qui.
                        Lorem IpsumExercitation esse qui quis magna consequat ut ad tempor deserunt est. Pariatur consequat
                        officia esse sunt velit est irure commodo eiusmod irure magna occaecat ea ipsum. Ut consectetur nisi
                        magna culpa id incididunt quis eiusmod ullamco exercitation. Aliqua reprehenderit sit commodo esse
                        nisi qui incididunt adipisicing quis consectetur in est laboris. Do non ex voluptate mollit Lorem
                        qui.
                    </p>
                    <p id="read-more" style="display: none;">
                        Lorem IpsumExercitation esse qui quis magna consequat ut ad tempor deserunt est. Pariatur consequat
                        officia esse sunt velit est irure commodo eiusmod irure magna occaecat ea ipsum. Ut consectetur nisi
                        magna culpa id incididunt quis eiusmod ullamco exercitation. Aliqua reprehenderit sit commodo esse
                        nisi qui incididunt adipisicing quis consectetur in est laboris. Do non ex voluptate mollit Lorem
                        qui.
                        Lorem IpsumExercitation esse qui quis magna consequat ut ad tempor deserunt est. Pariatur consequat
                        officia esse sunt velit est irure commodo eiusmod irure magna occaecat ea ipsum. Ut consectetur nisi
                        magna culpa id incididunt quis eiusmod ullamco exercitation. Aliqua reprehenderit sit commodo esse
                        nisi qui incididunt adipisicing quis consectetur in est laboris. Do non ex voluptate mollit Lorem
                        qui.
                    </p>
                    <button class="btn btn-dark btn-lg about-btn" type="button" onclick="viewMore(this)">Read More</button>
                </div>
            </div>
        </div>

    </section>

    <div id="id01" class="modal align-items-center">

        <form class="form-horizontal modal-content animate " action="/login" method="post">
            @csrf
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <img src="{{ asset('img/avatar.jpg') }}" alt="Avatar" class="avatar">
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
                    <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password"
                        required>
                    @if ($errors->any())
                        <script>
                            $("a .fa-user").click()
                        </script>
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


    <script src="{{ asset('js/Home.js') }}"></script>
    <script>
        if ($(window).width() <= 600) {
            $("#add_container").addClass("container");
        }

        function viewMore(button) {
            button.style.display = "none";
            let paragraph = document.getElementById("read-more");
            paragraph.style.display = "inline";
        }
    </script>
@endsection
