<?php


  session_start();
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: login.php");
    exit;
  }
?>


<?php
$db=mysqli_connect("localhost","root","Afnan123","mydata");

if(isset($_POST["add"])){

$todo=$_POST["todo"];
$userc=$_SESSION["name1"];
$sql="INSERT INTO todo VALUES('$userc','$todo');";
mysqli_query($db,$sql);
}
if(isset($_POST["remove"])){

$todo=$_POST["todo"];
$userc=$_SESSION["name1"];

$sql="DELETE FROM todo WHERE todo='$todo' AND user='$userc';";
mysqli_query($db,$sql);

}
?>
<html>
<head>
<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}


input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  
  
  font-size:150%;;
  height:100px;
}

input[type=text] {
  border: 2px solid #4CAF50;
  width:450px;
  border-radius: 4px;
 height: 70px;
}

body
{
color :#4CAF50;
}

table.center {
    margin-left:auto; 
    margin-right:auto;
  }

td{
padding-left:600px;
padding-top:10px;
}

</style>

</head>

<body>

<br>
<p align="right">
<a href="logout.php" class="button">Log out</a>
</p>
<h2><?php echo "Welcome ".$_SESSION["name1"];?></h2>
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 align="center">Bucket List</h2>
        <p align="center">
        <input type="text" placeholder="add to your bucketlist here" name="todo" required>
        <br><br>
        <input style="border: none;width: 80px;height: 30px;" type="submit" name="add" value="+"></button>
        
        <input style="border: none;width: 80px;height: 30px;" type="submit" name="remove" value="-">
	</p>
    </form>
<br><br>
<?php
       $db=mysqli_connect("localhost","root","Afnan123","mydata");
	$userc=$_SESSION["name1"];

       $sql="SELECT todo FROM todo where user='$userc';";
       $result=mysqli_query($db,$sql);
?>

<table style="width: 100%">
<tr><th>My bucketlist</th></tr>
<br>
<?php
  while($name=$result->fetch_assoc()){
  
  echo "<tr>"."<td>".$name["todo"]."</td>"."</tr>";
 }
?>


</table>
</div>

</body>
</html>


