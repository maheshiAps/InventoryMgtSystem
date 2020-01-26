<?php 
session_start(); //session starting
session_destroy(); //session destrying
session_start();
include 'dbcon.php'; //including connection
if(isset($_POST['submit'])){

  $username=$_POST['uname'];
  $password=$_POST['pw'];
  $key='FNDN@@!#3442EININCxewfqfNISNNCEjdnfjdsFEFFEFSAEd2121121';//encrypting key
    $enp=hash('SHA256',$password.$key); //encypting mechanism



//check username and password in customer table
    $check1=mysqli_query($con,"SELECT * FROM academic WHERE Username='$username' AND Password='$enp' AND status='1'");



//check username and password in user table

    $check2=mysqli_query($con,"SELECT * FROM nonacademic WHERE Username='$username' AND Password='$enp' AND status='1'");

    $check2=mysqli_query($con,"SELECT * FROM student WHERE Username='$username' AND Password='$enp' AND status='1'");


    $num_of_rows1=mysqli_num_rows($check1); //check # of rows
    $num_of_rows2=mysqli_num_rows($check2);
    $num_of_rows3=mysqli_num_rows($check3);



//when a customer login, redirect to the customer dashboard
    if($num_of_rows1==1){

      while($row1=mysqli_fetch_array($check1)){ 

        $_SESSION['usernm']=$row1['Username'];
        $_SESSION['user']=$row1['FullName'];
        $_SESSION['role']=$row1['Role'];
        

        header('Location:index.php');//customer dashboard
      
        
      }

    }


    //when a user login,redirect to the user dashboard
    if($num_of_rows2==1){

      while($row2=mysqli_fetch_array($check2)){

        $_SESSION['user']=$row2['FullName'];
        $_SESSION['usernm']=$row2['Username'];
        $_SESSION['role']=$row2['Role'];
        
header('Location:index.php');


        
          // header('Location:index.php');//user,employee dashboard
        
        
        
      }

    }
        //when a user login,redirect to the user dashboard
    if($num_of_rows3==1){

      while($row2=mysqli_fetch_array($check3)){

        $_SESSION['user']=$row2['FullName'];
        $_SESSION['usernm']=$row2['Username'];
        $_SESSION['role']=$row2['Role'];
        
header('Location:studentdashboard.php');


        
          // header('Location:index.php');//user,employee dashboard
        
        
        
      }

    }
    
}

if(isset($_POST['reset'])){
 header('Location:resetpw.php');
          

  }

?><!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.15
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>ChemLAB | Login </title>
    <!-- Icons-->
    <link href="node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="vendors/css/font-awesome.min.css" rel="stylesheet">
    <link href="node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <form action="" method="post">
                 <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-user"></i>
                    </span>
                  </div>
                  <input class="form-control " type="text" placeholder="Username" name="uname">
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-key"></i>
                    </span>
                  </div>
                  <input class="form-control " type="password" placeholder="Password" name="pw">
                </div>
                <div class="row">
                  <div class="col-6">
                    <button class="btn btn-primary px-4" type="submit" name="submit">Login</button>
                  </div>
                  <div class="col-6 text-right">
                    <button class="btn btn-link px-0" type="button" name="reset">Forgot password?</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Sign up</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <a href="#" class="btn btn-primary active mt-3" name="register">Register Now!</a>
                  
                </div>
              </div>
            </div>
              </form>
             
          </div>
        </div>
      </div>
    </div>
    
    <script src="vendors/jquery/js/jquery.min.js"></script>
    <script src="vendors/jquery/js/popper.min.js"></script>
    <script src="vendors/jquery/js/bootstrap.min.js"></script>
    <script src="vendors/jquery/pace-progress/pace.min.js"></script>
    <script src="vendors/jquery/js/pace.min.js"></script>
    <script src="vendors/jquery/js/perfect-scrollbar.min.js"></script>
    <script src="vendors/jquery/js/coreui.min.js"></script>
  </body>
</html>
