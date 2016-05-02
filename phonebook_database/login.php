<?php     //start php tag
//include connect.php page for database connection
Include('connect.php');
//if submit is not blanked i.e. it is clicked.
if (isset($_REQUEST['Submit'])) //here give the name of your button on which you would like    //to perform action.
{
  $password = md5($_REQUEST['password']);
// here check the submitted text box for null value by giving there name.
    if($_REQUEST['user_id']=="" || $_REQUEST['password']=="")
    {
    echo " Field must be filled";
    }
    else
    {
       $sql1= "select * from users where email= '".$_REQUEST['user_id']."' &&  password ='".$password."'";
      $result=mysqli_query($conn, $sql1);
        $num_rows=mysqli_num_rows($result);
       if($num_rows>0)
       {
//here you can redirect on your file which you want to show after login just change filename ,give it to your filename.
           //header("location:filename.php"); 
 //OR just simply print a message.
        session_start();
        $_SESSION['loggedin'] = true;
         header('location:index.php');
        }
        else
        {
            $ErrorMsg = "username or password incorrect";
        }
    }
}    
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
  <title>LogIn</title>


<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- tynymce -->
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>


<!-- Custom js -->
<script type="text/javascript" charset="utf8" src="js/custom.js"></script>

  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js"></script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>PHP Login Form</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">
</head>

<body>
  <div class="wrapper">

    <!-- header section -->
    
<div class="header">
</div> 
<div class="container">
  <div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form name="form_login" method="post" action="login.php" role="form">
        <fieldset>
          <h1>Please Log Into Contact Manager</h1>
          <hr class="colorgraph">
          <div class="form-group">
            <input name="user_id" type="text" id="user_id" class="form-control input-lg" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
          </div>
          
          <hr class="colorgraph">
          <?php
          if (isset($ErrorMsg)) {
             echo "<p style='color:#ea6a48'>" . $ErrorMsg . "</p>";
          }
         
          ?>
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <input type="submit" name="Submit" value="Login" class="btn btn-lg btn-success btn-block">
        </fieldset>
      </form>
    </div>
  </div>
</div>
</body>
</html>





