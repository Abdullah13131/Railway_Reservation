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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
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
                        <a href="/trains" class="nav-link main-fg-color active">
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
                    <h1>Manage Trains</h1>
                </div>
                <!-- Operations -->

                <!-- Booking -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header ">
                                <h4>Trains</h2>
                                    <a href="#" type="button" data-toggle="modal" data-target="#add-user" class="btn btn-dark">Add New</a>
                            </div>
                            <!-- Add Users Modal -->
                            <div class="modal fade" id="add-user">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Train</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="container">
                                                <form action="/addTrain" method="post">
                                                    @csrf
                                                    <img src="{{ asset('admin/images/train.png')}}" class="rounded modal-img" alt="Cinque Terre">
                                                    <hr>

                                                    <div class="form-group">
                                                        <label for="train-name">Train Name</label>
                                                        <input name="train_name"  type="text" class="form-control" placeholder="Train Name" id="train-name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="train-number">Train Number</label>
                                                        <input name="number" type="text" class="form-control" placeholder="Train Number" id="train-number">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="train-seats">No of Seats</label>
                                                        <input name="seats" type="number" class="form-control" placeholder="Number of seats" id="train-seats">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="train-description">Description</label>
                                                        <textarea name="description" class="form-control" name="train-description" id="" cols="20" rows="5"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="train-type">Train Type</label>
                                                        <select name="type" class="form-control" id="train-type">
                                                          <option>Green Line</option>
                                                          <option>Bolan Express</option>
            
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="deptstation_id">Dept Station ID</label>
                                                        <input name="depart_stationid" type="number" class="form-control" placeholder="Dept Station ID" id="deptstation_id">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="arrivestation_id">Arrive Station ID</label>
                                                        <input name="arrive_stationid" type="number" class="form-control" placeholder="Dept Station ID" id="arrivestation_id">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="dept_time">Departure Time</label>
                                                        <input name="depart_time" type="text" class="form-control" placeholder="Departure time" id="dept_time">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="arriveTime">Arrival Time</label>
                                                        <input name="arrive_time" type="text" class="form-control" placeholder="Arrival time" id="arriveTime">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="price">Price</label>
                                                        <input name="price" type="text" class="form-control" placeholder="Price" id="price">
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
                                            <th>Train Name</th>
                                            <th>Train Number</th>
                                            <th>Seats</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($trainInfo as $train)
                                            <tr>
                                                <td>{{$train->name}}</td>
                                                <td>{{$train->train_number}}</td>
                                                <td>{{$train->num_of_seats}}</td>
                                                <td>
                                                    <div class="card-body">
                                                        <div class="card-header ">
                                                            <a href="#" type="button" data-toggle="modal" data-target="#update-train" class="btn btn-dark">Edit</a>
                                                            <a href="/deleteTrain/{{$train->train_id}}" class="btn btn-danger btn-delete">Delete</a>
                                                        </div>
                                                        <div class="modal fade" id="update-train">
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
                                                                            <form action="/editTrain/{{$train->train_id}}" method="post">
                                                                                <img user-default.png" class="rounded modal-img" alt="Cinque Terre">
                                                                                <hr>
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <div class="form-group">
                                                                                            <label for="name">Train Name</label>
                                                                                            <input name="name" type="text" class="form-control" placeholder="Name" id="name">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="num">Train Number</label>
                                                                                    <input name="train_num" type="train number" class="form-control" placeholder="Enter train number" id="num">
                                                                                </div>
                                                                                
                                                                                <div class="form-group">
                                                                                    <label for="seat">Seats:</label>
                                                                                    <input name="seats" type="seats" class="form-control" placeholder="Enter number of seats" id="seat">
                                                                                </div>

                                                                                <button type="submit" class="btn btn-success btn-wide ">Update</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
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