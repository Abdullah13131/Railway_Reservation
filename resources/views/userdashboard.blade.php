<?php
Session();

?>
@extends('layouts.layout')
@section('headers')
<link rel="stylesheet" href="{{ asset('css/userdashboard.css')}}">

@endsection
@section('content')
<nav class="navbar navbar-expand-sm  navbar-dark bg-dark" style="box-shadow: 10px 10px 100px #EAE8FE;">
    <a href=""><span><span style="color: teal; font-size: 30px; font-weight: bold;">Pakistan</span><span style="color:orange;font-size: 30px;">Railways</span></span></a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav nav-pills ml-auto text-center">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="contact_us">Contact</a></li>
            <li class="nav-item"><a class="nav-link active">My Account</a></li>
        </ul>
    </div>
    <a style="cursor: pointer;"><i class="fas fa-user" style="font-size: 30px; margin:10px"></i></a>
</nav>

<div class="row">
    <div class="col-12">
        <div class="jumbotron" style="height:auto">
            <div class="row">
                <div class="col-11 offset-1 col-sm-9 offset-sm-1">            
                    {{-- <h1 style="font-size: 60px;">{{ $data[0]->name }}</h1> --}}
                    <h1 style="font-size: 60px;">{{session('name')}}</h1>
                    <p>Islamabad , Pakistan</p>
                </div>
                <div class="col-11 col-sm-2">
                    <figure style="text-align: center;">
                        <img src="{{ asset('img/user_default_pic.png')}}" alt="" height="120px" width="170px">
                        <button class="btn btn-secondary" onclick="window.open('logout','_self');" style="width: 100px;">Signout</button>
                    </figure>

                </div>

            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-2 bg-dark" style="padding: 25px;" id="sidebar">
        <button class="btn btn-dark active" style="margin: 0px; margin-bottom: 2px;" for="bookedtickets">Booked Tickets</button>
        <button class="btn btn-dark " style="margin: 0px;margin-bottom: 2px; " for="complaints">Complaints</button>
        <button class="btn btn-dark " style="margin: 0px; margin-bottom: 2px;" for="cancelled">Cancelled Tickets</button>
        <button class="btn btn-dark " style="margin: 0px; margin-bottom: 2px;" for="profile_edit">Profile Edit</button>
    </div>
    <div class="col-sm-10">
        <section id="bookedtickets">

            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4>Bookings</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Train Name</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Departure Time</th>
                                </tr>
                            </thead>
                            <tbody  id="booking_table">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <section id="complaints">

            <div class="card col-md-12">
                <div class="card-body">
                    <div class="card-header">
                        <h4>Complaints</h2>
                            
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table" style="padding: 0px;">
                            <thead>
                                <tr>
                                    <th>Complaint ID</th>
                                    <th>Telephone</th>
                                    <th>Description</th>

                                </tr>
                            </thead>
                            <tbody id="complaint_table">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <section id="cancelled">

            <div class="card col-md-12">
                <div class="card-body">
                    <div class="card-header">
                        <h4>Cancelled Bookings</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Train Name</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Departure Time</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: #f8d7da; color: #872639;" data-toggle="modal" data-target="#cancel-download" id="cancelled_table">
                                <tr>
                                    <td>Daniyal</td>
                                    <td>Lahore</td>
                                    <td>Karachi</td>
                                    <td>6 A.M</td>
                                    <td><a href="#"><i style="font-size: 25px; color:rgb(43, 117, 214);" class="fas fa-print"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <section id="profile_edit">

            <div class="card col-md-12">
                <div class="card-body">
                    <div class="card-header">
                        <h4>Edit Profile</h2>
                    </div>
                    <div class="card-body">
                        <form action="/updateprofile" method="post" id="form" class="form">
                            @csrf
                            <div class="form-group py-2">
                                <label for="f_name">Name</label>
                                <input type="text" name="f_name" id="f_name" class="form-control" value="{{session('name')}}" readonly=true>
                                <small>Error Message</small>
                            </div>
                            <div class="form-group py-2">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{session('email')}}" readonly>
                                <input type="text" name="curr_email" value="{{session('email')}}" hidden>
                                <small>Error Message</small>
                            </div>
                            <div class="form-group py-2">
                                <label for="oldpassword">Old Password</label>
                                <input type="password" name="oldpassword" id="oldpassword" class="form-control" value="" readonly>
                                <small>Error Message</small>
                            </div>
                            <div class="form-group py-2">
                                <label for="password">New Password</label>
                                <input type="password" name="password" id="password" class="form-control" value="" readonly>
                                <small>Error Message</small>
                            </div>
                            <div class="form-group py-2 text-center">
                                <input id="edit" type="button" class="btn btn-info col-4" value="Edit">
                                <input id="save" type="submit" class="btn btn-success col-4" value="Save">
                            </div>
                            <div class="form-group text-center">
                                @isset($error)
					            <p style="color: red">{{$error}}...</p>
				                @endisset
                                <button type="button"data-toggle="modal" data-target="#delete-account" class="btn btn-danger col-5"><i class="fas fa-trash-alt" style="margin-right:10px;"></i>Delete Account</button>
                                
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

</div>
<div class="modal fade" id="cancel-download">
    <div class="modal-dialog  text-center">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <div class="col-11">
                    <h4 class="modal-title">Choose Option</h4>
                </div>
                <div class="col-1">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container">
                    <button id="download" value="" type="button" class="btn"> <i style="font-size: 25px; color:rgb(43, 117, 214);" class="fas fa-print"></i> Download PDF</button>
                    <button id="cancel-button" type="button" class="btn"><a href=""><i style="font-size: 25px; color:rgb(177, 26, 76);" class="far fa-times-circle"></i> Cancel Ticket</a></button>

                </div>

            </div>



        </div>
    </div>

</div>
<div class="modal fade" id="delete-account">
    <div class="modal-dialog  text-center">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <div class="col-11">
                    <h4 class="modal-title">Are You Sure ?</h4>
                </div>
                <div class="col-1">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container">
                    
                    <button onclick="window.location.href='/deleteaccount/{{session('user_id')}}' " type="button" style="font-size: 25px; background-color:rgb(177, 26, 76); class="btn"> Delete </button>

                </div>

            </div>



        </div>
    </div>

</div>

<script type="module" src="{{ asset('js/form-validation/formValidationHelpers.js')}}"></script>
<script type="module" src="{{ asset('js/form-validation/editProfile.js')}}"></script>
<script src="{{ asset('js/userdashboard.js')}}"></script>

@endsection