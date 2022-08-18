<?php 
//craete connection
$dsn="mysql:host=localhost; dbname=test;";
$db_user="root";
$db_password="";
try{
    $conn = new PDO($dsn, $db_user,$db_password);  
    echo "Connection Stablish.<br/>";
}
catch(PDOException $e){
    echo "Connection Failed" . $e->getMessage(); 
}
if(isset($_REQUEST['delete'])){
    $sql="DELETE FROM student WHERE id= :id";
$result=$conn->prepare($sql);
$result->bindParam(':id', $id ,  PDO::PARAM_INT);
$id=$_REQUEST['id'];
$result->execute();
echo $result->rowCount() . "Row Deleted";
unset($result);
}
/*
$sql="DELETE FROM student WHERE id= :id";
$result=$conn->prepare($sql);
$result->bindParam(':id', $id ,  PDO::PARAM_INT);
$id=19;
$result->execute();
echo $result->rowCount() . "Row Deleted";
unset($result);
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
$sql="SELECT * from student";
$result=$conn->prepare($sql);
$result->execute();
if($result->rowCount() >0){
 echo '<table class="table">';
   echo "<thead>";
   echo"<tr>";
    echo "<th>ID</th>";
    echo "<th>NAme</th>";
    echo "<th>Roll NO</th>";
    echo "<th>Address</th>";
    echo "<th>Action</th>";
   echo"</tr>";
   echo "</thead>";
   echo"<tbody>";
   while($row=$result->fetch(PDO::FETCH_ASSOC)){
     echo "<tr>";
      echo"<td>". $row['id']."</td>";
      echo"<td>". $row['name']."</td>";
      echo"<td>". $row['roll']."</td>";
      echo"<td>". $row['address']."</td>";
      echo '<td><form action="" method="POST"><input
      type="hidden" name="id" value=' . $row['id'] . '>
      <input type="submit" class= "btn btn-sm btn-danger"
      name="delete" value="Delete"></form></td>';
     echo "</tr>";
   }
   echo "</tbody>";
   echo '</table>';
}else{
    echo "No records";
}
$conn=null;
?>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>