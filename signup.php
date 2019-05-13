<?php

  $db=mysqli_connect("localhost","root","Afnan123","mydata");
  $uerr=$perr="";
  if(isset($_POST["signup"])){
    $name=$_POST["name"];
    $uname=$_POST["uname"];
    $pword=$_POST["pword"];
    $confirm=$_POST["confirm"];
    $sql="SELECT * FROM mytable where username='$uname';";
    $result=mysqli_query($db,$sql);
    $count=mysqli_num_rows($result);
    if($count>0){
      $uerr="Username already exists"."<br>";
    }

    if($pword!==$confirm){
      $perr="Passwords do not match"."<br>";
    }

    if(empty($uerr) && empty($perr)){
      $sql="INSERT INTO mytable VALUES('$name','$uname','$pword')";
      mysqli_query($db,$sql);
      header("Location: login.php");
      exit;
    }
  }
?>

<html>
<style>
 .err{
     font-size: 22px;
     color: red;
     font-style: italic;
    }
 .col4{
      width: 33.33%;
      float: left;
      padding: 3px;
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
<body>
 <div class="row">
    <div class="col4"></div>
    <div class="col4">
    <br><br><br><br>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   <fieldset>
        <h2>sign up</h2>

    <input type="text" placeholder="Enter Your Name" name="name" required>
    <br><br>
    <input type="text" placeholder="Username" name="uname" required>
    <br><br>
    <span><?php echo $uerr;?></span>
    <input type="password" placeholder="Password" name="pword" required> 
     <br><br>
    <input type="password" placeholder="confirm password" name="confirm" required> 
    <br><br>

	<span><?php echo $uerr;?></span>

    <span class="err">
     <?php echo $perr;?>
     </span>
<br><br>
    <input type="submit" name="signup" value="Sign Up"> 
    </fieldset>  
  </form>
  
</div>
 <div class="col4"></div>
    </div>

</body>
</html>
