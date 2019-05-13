<?php
  session_start();
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
    header("Location: welcome.php");
    exit;
  }
?>
<html>
  <head>
  <style>
   .invalid{
     font-size: 12px;
     color: red;
     font-style: italic;
    }

    .col4{
      width: 33.33%;
      float: left;
      padding: 2px;
    }

    .row{
      width: 100%;
    }

   form{
      background: #4CAF50;
      text-align: center;
   }
  h2{
    color: white;
  }

  </style>
  </head>
  <body>
    <?php
    $db=mysqli_connect("localhost","root","Afnan123","mydata");
    $err="";
    if(isset($_POST['submit'])){
        $user=$_POST['userName'];
        $pass=$_POST['password'];
        if( !empty($_POST['userName']) && !empty($_POST['password'])){
        $sql="SELECT * FROM mytable WHERE username='$user' and password='$pass' ;";
        $result=mysqli_query($db,$sql);
        $cr=mysqli_num_rows($result);
        if($cr>0){

     $_SESSION["loggedin"]=true;
     $_SESSION["username"]=$user;
     $sql1="SELECT name FROM mytable WHERE username='$user' and password='$pass' ;";
     $result=mysqli_query($db,$sql1);
     $name=$result->fetch_assoc();
     $_SESSION ["name1"]=$name["name"];
     header("Location: welcome.php");
         exit;
      }
      else{
         $err="Invalid Username or Password";
      }
    }
    }
    ?>
    <div class="row">
    <div class="col4"></div>
    <div class="col4">
    <br><br><br><br><br><br><br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <fieldset>
        <h2>Log In</h2>
        
        <input type="text" placeholder="Enter Username" name="userName" required> <br>
        <br>
        
        <input type="password" placeholder="Enter Password" name="password" required> <br>
        <span class="invalid"><?php echo $err."<br>";?></span>
        <br>
	<a href ="signup.php" ><button>Sign Up</button></a>
        <input type="submit" name="submit" value="Log In">
	
        
   </fieldset>

    </form>
      </fieldset>
    </div>
    <div class="col4"></div>
    </div>

    
  </body>

</html>



