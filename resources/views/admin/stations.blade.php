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
                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hello, Admin
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/admin_Logout">Logout</a>
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
                        <a href="/admin/index" class="nav-link main-fg-color ">
                            <i class="material-icons side-bar-icon">dashboard</i>
                            <span class="text side-bar-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/users" class="nav-link main-fg-color ">
                            <i class="material-icons side-bar-icon">people_alt</i>
                            <span class="text side-bar-text">Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/trains" class="nav-link main-fg-color ">
                            <i class="material-icons side-bar-icon">train</i>
                            <span class="text side-bar-text">Trains</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/stations" class="nav-link main-fg-color active">
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
                    <h1>Manage Stations</h1>
                </div>
                <!-- Operations -->

                <!-- Booking -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header ">
                                <h4>Stations</h2>
                                    <a href="#" type="button" data-toggle="modal" data-target="#add-user" class="btn btn-dark">Add New</a>
                            </div>
                            <!-- Add Users Modal -->
                            <div class="modal fade" id="add-user">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Station</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="container">
                                                <form action="/addStation" method="post">
                                                    @csrf
                                                    <img src="{{ asset('admin/images/station.png')}}" class="rounded modal-img" alt="Cinque Terre">
                                                    <hr>

                                                    <div class="form-group">
                                                        <label for="station-name">Station Name</label>
                                                        <input name="name" type="text" class="form-control" placeholder="Train Name" id="station-name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="station-description">Description</label>
                                                        <textarea name="description" class="form-control" name="station-description" id="" cols="20" rows="5"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="station-type">Station Type</label>
                                                        <select name="type" class="form-control" id="station-type">
                                                          <option>Terminus</option>
                                                          <option>Central</option>
                                                          <option>Junction</option>
                                                          <option>Station</option>
            
                                                        </select>
                                                    </div>


                                                    <button type=" submit " class="btn btn-success btn-wide ">Save</button>
                                                </form>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                            </div>
                            <!-- Users Table -->
                            <div class="card-body ">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Station Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($stationInfo as $station)
                                            <tr>
                                                <td>{{$station->name}}</td>
                                                <td>
                                                    <div class="card-body">
                                                        <div class="card-header ">
                                                            <a href="#" type="button" data-toggle="modal" data-target="#update-station" class="btn btn-dark">Edit</a>
                                                            <a href="/deleteStation/{{$station->station_id}}" class="btn btn-danger btn-delete">Delete</a>
                                                        </div>
                                                        <div class="modal fade" id="update-station">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">

                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit User</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <form action="/editStation/{{$station->station_id}}" method="post">
                                                                                <img user-default.png" class="rounded modal-img" alt="Cinque Terre">
                                                                                <hr>
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <div class="form-group">
                                                                                            <label for="name">Station Name</label>
                                                                                            <input name="name" type="text" class="form-control" placeholder="Name" id="name">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="station-type">Station Type</label>
                                                                                    <select name="type" class="form-control" id="station-type">
                                                                                    <option>Terminus</option>
                                                                                    <option>Central</option>
                                                                                    <option>Junction</option>
                                                                                    <option>Station</option>
                                        
                                                                                    </select>
                                                                                </div>
                                                                
                                                                                <button type="submit" class="btn btn-success btn-wide ">Update</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <a href="# " class="btn btn-primary ">Edit</a> --}}
                                                    {{-- <a href="/deleteStation/{{$station->station_id}}" class="btn btn-danger ">Delete</a> --}}
                                                </td>
                                            </tr>
                                            {{-- <tr>
                                                <td>Lahore</td>
                                                <td>Terminal</td>
                                                <td>
                                                    <a href="# " class="btn btn-primary ">Edit</a>
                                                    <a href="# " class="btn btn-danger ">Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Islamabad</td>
                                                <td>Central</td>
                                                <td>
                                                    <a href="# " class="btn btn-primary ">Edit</a>
                                                    <a href="# " class="btn btn-danger ">Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Islamabad</td>
                                                <td>Central</td>
                                                <td>
                                                    <a href="# " class="btn btn-primary ">Edit</a>
                                                    <a href="# " class="btn btn-danger ">Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Islamabad</td>
                                                <td>Central</td>
                                                <td>
                                                    <a href="# " class="btn btn-primary ">Edit</a>
                                                    <a href="# " class="btn btn-danger ">Delete</a>
                                                </td>
                                            </tr> --}}
                                        @endforeach
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