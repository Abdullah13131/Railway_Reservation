<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <title>Admin Panel</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-darker fixed-top" style="box-shadow: 10px 10px 100px #EAE8FE;">
        <a href=""><span><span style="color: teal; font-size: 30px; font-weight: bold;">Pakistan</span><span style="color:orange;font-size: 30px;">Railways</span></span></a>
        <button class="navbar-toggler sidebar-toggle" type="button">
            <span class="material-icons">widgets</span>
          </button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="material-icons">admin_panel_settings</span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown ml-auto">
                    <a class="nav-link  " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hello, Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/admin/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
        
    </nav>
    <div id="overlay"></div>
    <div class="wrapper d-flex">
        <!-- Side Bar -->
        <div class="side-menu bg-dark">
            <div class="sidebar ">
                <ui class="navbar-nav">
                    <li class="nav-item">
                        <a href="/admin/index" class="nav-link main-fg-color active">
                            <i class="material-icons side-bar-icon">dashboard</i>
                            <span class="text side-bar-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/users" class="nav-link main-fg-color">
                            <i class="material-icons side-bar-icon">people_alt</i>
                            <span class="text side-bar-text">Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/trains" class="nav-link main-fg-color">
                            <i class="material-icons side-bar-icon">train</i>
                            <span class="text side-bar-text">Trains</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/stations" class="nav-link main-fg-color">
                            <i class="material-icons side-bar-icon">map</i>
                            <span class="text side-bar-text">Stations</span>
                        </a>
                    </li>

                </ui>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <main>
                <div class="header">
                    <h1>ADMIN DASHBOARD</h1>
                </div>
                <!-- Operations -->
                <div class="row ">
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3 p-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class="material-icons">people_alt</i></h4>
                                <a href="/users" type="button" class="btn btn-dark">Manager Users</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3 p-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class="material-icons">train</i></h4>
                                
                                <a href="/trains" type="button" class="btn btn-dark">Manage Trains</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3 p-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class="material-icons">map</i></h4>
                                
                                <a href="/stations" type="button" class="btn btn-dark">Manager Stations</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Booking -->
                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-body">
                            <div class="card-header">
                                <h4>Latest Bookings</h2>
                                    <a href="#" type="button" class="btn btn-dark">View All</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>John</td>
                                            <td>KARACHI</td>
                                            <td>ISLAMABAD</td>
                                            <td>6:00 A.M</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <script src="{{ asset('admin/js/sidebar.js')}}"></script>


</body>

</html>