<?php
$db_host= "localhost";
$db_user="root";
$db_password="";
$db_name="test";
//craete connection
$conn = new mysqli($db_host,$db_user,$db_password,$db_name);
//checking connection
if($conn->connect_error){
    die("connection Failed");
}
echo "connected succesfully <hr>";



/*
//selete all data
$sql="SELECT * from student WHERE id=?";
//prepared statement
$result=$conn->prepare($sql);
$result->bind_param('i',$id);
$id=9;
//bind result
$result->bind_result($id,$name,$roll,$address);

//exexute
$result->execute();
//fetch 


while($result->fetch()){
    echo  "ID: " . $id . "Name: ". $name ."Roll:" .$roll."Address: " .$address . "<br/>";
}
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

    <title>Data Fetch</title>
  </head>
  <body>
  <div class="container">
<?php
$sql="SELECT * FROM student";
$result=$conn->prepare($sql);
$result->bind_result($id,$name,$roll,$address);
$result->execute();
$result->store_result();
if($result->num_rows>0){
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
   while($result->fetch()){
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
$result->close();
$conn->close();
?>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>