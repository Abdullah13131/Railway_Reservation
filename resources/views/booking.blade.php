
<?php
Session();

?>
@extends('layouts.layout')
@section('headers')
<link rel="stylesheet" href="{{ asset('css/booking.css')}}">
@endsection
@section('content')
        <nav class="navbar navbar-expand-sm  navbar-dark bg-dark" style="box-shadow: 10px 10px 100px #EAE8FE;">
            <a href=""><span><span style="color: teal; font-size: 30px; font-weight: bold;">Pakistan</span><span style="color:orange;font-size: 30px;">Railways</span></span></a>
            <button class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon ml-auto"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav nav-pills ml-auto text-center">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact_us">Contact</a></li>
                    <li class="nav-item"><a class="nav-link active" href="">Booking</a></li>
                    @if (Session()->has('user_id'))
                        <li class="nav-item"><a class="nav-link" onclick="window.open('userdashboard');" style="cursor: pointer;">My Account</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" onclick="document.getElementById('id01').style.display='block'" style="cursor: pointer;">My Account</a></li>
                    @endif

                </ul>
            </div>
            @if (Session()->has('user_id'))
            <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" style="cursor: pointer;"><i class="fas fa-user "  style="font-size: 30px; margin:10px" style="width:auto; "></i></a>
            <span class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="/logout">Logout</a>
            </span>
            @else
              <a style="cursor: pointer;"><i class="fas fa-user" style="font-size: 30px; margin:10px" onclick="document.getElementById('id01').style.display='block'" style="width:auto; "></i></a>
            @endif
        </nav>

        <div class="row">
            <div class="col-12">
                <div class="banner">
                    <h1 style="font-weight: bold;">RAILWAY BOOKING</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-body">
                        <div class="card-header">
                            <h4>{{count($data)}} Train(s) Found</h2>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-hover table-active table-striped">
                                            
                                <thead>
                                    <tr>
                                        <th>From</th>
                                        <th>Departure Time</th>
                                        {{-- <th></th> --}}
                                        <th>Arrival Time</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                @foreach( $data as $select )
                                <tbody >
                                    <tr data-toggle="modal" data-target="#book-ticket">
                                        <td id="model_show" name="{{$select->train_id}}" colspan=5 style="text-align: center;"><b><h3>{{ $select->train_name }} ({{$select->price}} Rs)</h3></b></td>
                                    </tr>
                                    <tr>
                                        <span>
                                        <td>{{$select->depart_station}}</td>
                                        <td>{{$select->depart_time}}</td>
                                        {{-- <td>30 hrs 50 min</td> --}}
                                        <td>{{$select->arrive_time}}</td>
                                        <td>{{$select->arrive_station}}</td>
                                        </span>
                                        {{-- <td><button id="book-button" value="{{$select->train_id}}" class="btn btn-info">Book</button></td> --}}
                                    </tr>
                                </tbody>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="book-ticket">
            <div class="modal-dialog  text-center">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <div class="col-11">
                            <h4 class="modal-title">Confirm Booking Ticket ?</h4>
                        </div>
                        <div class="col-1">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container">
                            <button  id="book-button" class="btn btn-info" value="">Book</button>
                        </div>

                    </div>
                </div>
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
                        @if( $errors->any() )
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


      <script src="{{ asset('js/Home.js')}}"></script>
      <script>
          $(".btn-info").click(function(){
            
            var train_id=$(this).val();
    
            @if(Session()->has('user_id'))
                window.open('/bookticket/'+train_id);
            @else
                alert("You must login before booking any ticket!");
            @endif
          });

          $('#model_show').click(function(){
                console.log('asdasd');
                var name = $(this).attr('name');
                $('.modal-body #book-button').val(name);
          });
      </script>
@endsection