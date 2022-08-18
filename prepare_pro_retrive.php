<?php 
$db_host= "localhost";
$db_user="root";
$db_password="";
$db_name="test";
$conn=mysqli_connect($db_host,$db_user,$db_password,$db_name);
if(!$conn){
    die("connection Failed" . mysqli_connect_error());
}
echo "Connected successfully <br/>";
/*
$sql="SELECT * FROM student WHERE id=?";
//prepare statement
$result=mysqli_prepare($conn,$sql);
//bind parameter
mysqli_stmt_bind_param($result,'i',$id);
$id=5;
//bind result set
mysqli_stmt_bind_result($result, $id,$name,$roll,$address);

//ececte preapred statement
mysqli_stmt_execute($result);
//fetch all row data
while(mysqli_stmt_fetch($result)){
echo "ID: " . $id . "Name: " .$name . "Roll: " .$roll . "Address: ".$address. "<br/>";
}
//close stament
mysqli_close($conn);
*/
?>
<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>DATA SHOWS</title>
  </head>
  <body>
  <div class="container">
<?php
$sql="SELECT * FROM student";
$result=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_result($result, $id,$name,$roll,$address);
mysqli_stmt_execute($result);
mysqli_stmt_store_result($result);
if(mysqli_stmt_num_rows($result)>0){
 echo '<table class="table">';
   echo "<thead>";
   echo"<tr>";
    echo "<th>ID</th>";
    echo "<th>NAme</th>";
    echo "<th>Roll NO</th>";
    echo "<th>Address</th>";
   echo"</tr>";
   echo "</thead>";
   echo"<tbody>";
   while(mysqli_stmt_fetch($result)){
     echo "<tr>";
      echo"<td>". $id."</td>";
      echo"<td>". $name."</td>";
      echo"<td>". $roll."</td>";
      echo"<td>". $address."</td>";
     echo "</tr>";
   }
   echo "</tbody>";
   echo '</table>';
}else{
    echo "No records";
}
?>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
<?php 
 mysqli_stmt_close($result);
 mysqli_close($conn);
 ?>

</html>
