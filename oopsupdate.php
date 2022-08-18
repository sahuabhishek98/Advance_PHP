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
if(isset($_REQUEST['update'])){
    if(($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") || ($_REQUEST['address'] == "")){
        echo "<small>Fill All Fields...</small><hr>";
    }
    else{
            $name= $_REQUEST['name'];
            $roll= $_REQUEST['roll'];
            $address= $_REQUEST['address'];
            $sql= "UPDATE student SET name = '$name' , roll= '$roll', address=
            '$address' WHERE id= {$_REQUEST['id']}";
            if($result=$conn->query($sql)){
                echo "Updated";
            }else{
                echo "not Updated.";
            }
    }
    }
?>
<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Update Data</title>
  </head>
  <body>
  <div class="container">
    <div class="row">
        <div class="col-sm-4">
            <?php
            if(isset($_REQUEST['edit'])){
                $sql="SELECT * FROM student WHERE id= {$_REQUEST['id']}";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
            }
            ?>
         <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name"
                id="name" value="<?php if(isset($row["name"])){
                    echo $row["name"];} ?>"> 
            </div>
            <div class="form-group">
                <label for="roll">Roll</label>
                <input type="text" class="form-control" name="roll"
                id="roll" value="<?php if(isset($row["roll"])){
                    echo $row["roll"];}?>"> 
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address"
                id="address" value="<?php if(isset($row["address"])){
                    echo $row["address"];}?>">  
            </div>
            <input type="hidden" name="id" value="<?php  echo $row['id']?>">
            <button  type="submit" class="btn btn-success" name="update">Update</button>  
         </form>
        </div>
        <div class="col-sm-6 offset-sm-2">
        <?php
$sql="SELECT * FROM student";
$result=$conn->query($sql);
if($result->num_rows>0){
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
   while($row=$result->fetch_assoc()){
     echo "<tr>";
      echo"<td>". $row['id']."</td>";
      echo"<td>". $row['name']."</td>";
      echo"<td>". $row['roll']."</td>";
      echo"<td>". $row['address']."</td>";
      echo '<td><form action="" method="POST"><input
      type="hidden" name="id" value=' . $row['id'] . '>
      <input type="submit" class= "btn btn-sm btn-warning"
      name="edit" value="Edit"></form></td>';
     echo "</tr>";
   }
   echo "</tbody>";
   echo '</table>';
}else{
    echo "No records";
}
$conn->close();
?>


        </div>
    </div>

  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>