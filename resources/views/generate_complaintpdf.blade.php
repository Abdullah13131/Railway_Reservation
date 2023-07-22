<!DOCTYPE html>
<html>
<head>
    <title>Generate Pdf</title>
    <style>
        h3,h4{
          display: inline;
        }
        h4{
            font-size: medium;
        }
        h3{
          font-family:Georgia, 'Times New Roman', Times, serif;
          font-size:large;
        }
        h4{
          margin-left: 40px;
          margin-right: 40px;
        }
        h2{
          font-size: x-large;
          background-color: rgba(208, 221, 197, 0.787);
        }
    </style>
</head>
<body>
    <div><span><span style="color: teal; font-size: 30px; font-weight: bold;">Pakistan</span><span style="color:orange;font-size: 30px;">Railways</span><span style="color:grey;font-size: 30px;">.com</span></span></div>
    <h1>Complaint</h1>
    <hr>
    <h2>User Details</h2>
    <h3>Name: </h3><h4>{{$username}}</h4>
    <h3>Email: </h3><h4>{{$email}}</h4>

    <hr>
    <hr>
    <h2>Complaint Details</h2>
    <h3>Complaint ID:</h3><h4>{{$complaint_id}}</h4>
    <h3>Telephone: </h3><h4>{{$tel}}</h4>
<br>
<br>
<br>
<h3>Description: </h3><h4>{{$description}}</h4>

</body>
</html>