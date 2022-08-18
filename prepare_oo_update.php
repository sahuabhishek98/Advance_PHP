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

        $sql="UPDATE student SET name = ?,roll = ?, address=? WHERE  id=?";
        $result=$conn->prepare($sql);
        if($result){
            $result->bind_param('sisi',$name,$roll,$address,$id);        
        $name= $_REQUEST['name'];
            $roll= $_REQUEST['roll'];
            $address= $_REQUEST['address'];
            $id=$_REQUEST['id'];
            $result->execute();
           echo  $result->affected_rows  . "Row updated";
        }
       $result->close();
    }
}
/*
$sql="UPDATE student SET name= ? , roll = ? , address = ?  WHERE id= ?";
$result=$conn->prepare($sql);
if($result){
    $result->bind_param('sisi',$name,$roll,$address,$id);
    $name="Soni";
    $roll=113;
    $address="Kolkata";
    $id=13;
    $result->execute();
     echo $result->affected_rows ."data updated";
}*/
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
                $sql="SELECT * FROM student WHERE id= ?";
                $result=$conn->prepare($sql);
                $result->bind_param('i',$id);
                $id= $_REQUEST['id'];
                $result->bind_result($id,$name,$roll,$address);
                $result->execute();
                $result->fetch();
                $result->close();
                
            }
            ?>
         <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name"
                id="name" value="<?php if(isset($name)){
                    echo $name;} ?>"> 
            </div>
            <div class="form-group">
                <label for="roll">Roll</label>
                <input type="text" class="form-control" name="roll"
                id="roll" value="<?php if(isset($roll)){
                    echo $roll;}?>"> 
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address"
                id="address" value="<?php if(isset($address)){
                    echo $address;}?>">  
            </div>
            <input type="hidden" name="id" value="<?php  echo $id ?>">
            <button  type="submit" class="btn btn-success" name="update">Update</button>  
         </form>
        </div>
        <div class="col-sm-6 offset-sm-2">
        <?php
$sql="SELECT * FROM student";
$result=$conn->prepare($sql);
$result->bind_result($id, $name, $roll, $address);
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
    echo "<th>Action</th>";
   echo"</tr>";
   echo "</thead>";
   echo"<tbody>";
   while($result->fetch()){
     echo "<tr>";
      echo"<td>". $id."</td>";
      echo"<td>". $name."</td>";
      echo"<td>". $roll."</td>";
      echo"<td>". $address."</td>";
      echo '<td><form action="" method="POST"><input
      type="hidden" name="id" value=' . $id . '>
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
