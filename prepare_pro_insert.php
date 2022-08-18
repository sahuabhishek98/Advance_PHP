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
if(isset($_REQUEST['submit'])){
    if(($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") || ($_REQUEST['address'] == "")){
        echo "<small>Fill All Fields...</small><hr>";
    }
 else{
    $sql="INSERT INTO student (name, roll, address) VALUES (?,?,?)";
    $result=mysqli_prepare($conn,$sql);
    if($result){
        mysqli_stmt_bind_param($result,'sis', $name,$roll,$address); 
    $name=$_REQUEST['name'];
    $roll=$_REQUEST['roll'];
    $address=$_REQUEST['address'];
    mysqli_stmt_execute($result);
    echo mysqli_stmt_affected_rows($result) . "Row insreted";
    }else{
        echo "Data not inserted.";
    }
    mysqli_stmt_close($result);
 }

}
/*//insert data
$sql="INSERT INTO student (name, roll, address) VALUES (?,?,?)";
$result=mysqli_prepare($conn,$sql);
if($result){
    mysqli_stmt_bind_param($result,'sis', $name,$roll,$address);
    $name = "Nelam";
    $roll = 115;
    $address = " Greter Noida";
    mysqli_stmt_execute($result);
    echo mysqli_stmt_affected_rows($result) . "Row insreted";
}
*/

mysqli_close($conn);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Registration Form</title>
  </head>
  <body>
    <div class="conatiner">
  <div class="row">
    <div class="col-sm-4">
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="roll">Roll no</label>
                <input type="text" class="form-control" name="roll" id="roll">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">
                Submit
            </button>
        </form>
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