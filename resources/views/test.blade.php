<?php
Session();
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/7ee3dcbac7.js" crossorigin="anonymous"></script>
        <style>
            *{
    font-family: 'Courier New', Courier, monospace;
}
.dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
    }

.next {
    right: 15;
    border-radius: 3px 0 0 3px;
    }
.prev {
        left: 15;
    }
    /* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
background-color: rgba(0,0,0,0.8);
}
.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    }
#info_buttons button{
text-align: left;    

}
i{
    margin-right: 10px;
}

.carousel-inner img {
    width: 100%;
    height: 70%;
    
  }
.navbar{
    position: -webkit-sticky;
    position: sticky;
    top: 0;;
    left: 9%;
    z-index: 9999;
}
        </style>
    </head>


    <body>
        <div class="container">
          
            <nav class="navbar navbar-expand-sm navbar-light bg-secondary ">
                <button class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#navbar">
                    <span class="navbar-toggler-icon " ></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#" style="font-weight: bold;">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact_us">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Account</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Administrator</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Booking</a></li>
                    </ul>
                </div>
            </nav>
            <header class="jumbotron" style="margin: 0px;">
                <div class="row">
  
                    <div class="col-12 col-sm-9">
                        <figure>
                            <h1 id="heading"><img src="tunnel.jpg" alt="" style="width: 150px;"><b><i> PAKISTAN RAILWAYS</i></b> </h1>
                        </figure>
                      
                    </div>
                    <div class=" col-12 col-sm-3 text-center">
                      <h4> User</h4>
                      <i class="fas fa-user" style="font-size: 70px; margin:10px"></i> <br>
                      <button class="btn btn-outline-secondary" type="button"  aria-haspopup="true" aria-expanded="false" id="logout_button">
                          Log out
                      </button>
                      
                      <button class="btn btn-outline-secondary" type="button"  aria-haspopup="true" aria-expanded="false" id="login_button">
                          Login
                      </button>
                    </div>
                </div>
            </header>
            
            <div class="row">
                <div class="col-12">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                          <li data-target="#demo" data-slide-to="0" class="active"></li>
                          <li data-target="#demo" data-slide-to="1"></li>
                          <li data-target="#demo" data-slide-to="2"></li>
                        </ul>
                        
                        <!-- The slideshow -->
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="img1.jpg" alt="Los Angeles" width="1100" height="200">
                          </div>
                          <div class="carousel-item">
                            <img src="img1.jpg" alt="Chicago" width="1100" height="200">
                          </div>
                          <div class="carousel-item">
                            <img src="img1.jpg" alt="New York" width="1100" height="200">
                          </div>
                        </div>
                        
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev " href="#demo" data-slide="prev" style="background-color: #343a40;">
                          <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next" style="background-color: #343a40;">
                          <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>

                </div>
            </div>
            

            <div class="row" style=" background-color: #f5f5f5;" >
                <div class="col-12 col-sm-4" >
                    <div class="btn-group-vertical" id="info_buttons">
                        <button style="width: 280px;" type="button" class="btn btn-light"><h5><i class="fa fa-train" aria-hidden="true"></i>    Route Information</h5></button>
                        <button type="button" class="btn btn-light"><h5><i class="fa fa-map-marker" aria-hidden="true"></i>    Station Information</h5></button>
                        <button type="button" class="btn btn-light"><h5><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Warnings</h5></button>
                      </div> 
                </div>
                <div class="col-12 col-sm-4">
                    <h2>New service is here! </h2>
                    <p>
                        The new Railaxed magazine is here. Get the magazine with inspiring stories, features and interviews.
                    </p>
                    
                </div>
                <div class="col-12 col-sm-4">
                    <h4>Top news</h2>
                    <h2>Current Information Regarding tickets</h3>
                </div>

            </div>



            <script src="Home.js"></script>

        </div>
    </body>
    <footer class="page-footer font-small blue pt-4">
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
        </div>
      </footer>
</html>