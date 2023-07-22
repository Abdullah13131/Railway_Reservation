<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/7ee3dcbac7.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/common.css')}}">
        @yield('headers')
    </head>
    <body>
        @yield('content')
    </body>
    
    <footer class="page-footer font-small blue pt-4" style="text-align: center;">
        <div class="footer-copyright text-center py-3"></div>
    </footer>
</html>