<?php
session_start();
if(isset($_SESSION['uid']))
{
    header("location:userr.php");
}




if(isset($_POST["loginbtn"]))
{
   
    include("dbconnect.php");

     $eid = $_POST["email"];
     $pwd = $_POST["password"];

 if($eid == "admin@123" &&  $pwd == "admin")
    {
    header("location:admin.php");
    } 
 $pwd = md5($_POST["password"]);
    
 $qry = "SELECT * FROM `register` WHERE email ='$eid'  AND  password = '$pwd'";


$result = mysqli_query($connect, $qry);
$row= mysqli_num_rows($result);

if($row>0)
{
    $data = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION ["uid"] = $data["id"];
    header("location:userr.php");
}
else
{
    echo "Invalid Email or password";
}
}
?> 



<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-image: url(images/A1.jpg); 
            background-size: cover;
            background-attachment: fixed;
        }
        .card {
      max-width: 400px;
      margin: auto;
      margin-top: 100px;
      padding: 40px;
      border-radius: 10px;
      background-color: #ffffff50;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .card h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    .card {
      text-align: center;
    }
    label{
      font-weight: bold;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-header bg-success text-light">
                      <b>  Login Form </b>
                    </div>
                    <div class="card-body">
                        <form method="post"> 
                            <div class="form-group">
                                <label> Email </label>
                                <input type="" name="email" class="form-control">
                            </div> 
                            <div class="form-group">
                                <label> Password </label>
                                <input type="password" name="password" class="form-control">
                            </div> 
                            <div class="form-group">
                                <button class ="btn btn-success" type="submit" name="loginbtn"> Login </button>
                            </div>
                            <p> Don't have an account? <a href ="register.php" >sing Up  </a> </p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>    