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

if(isset($_REQUEST['submit'])){
    if(($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") || ($_REQUEST['address'] == "")){
        echo "<small>Fill All Fields...</small><hr>";
    }
 else{
    $sql="INSERT INTO student (name,roll,address) VALUES(:name,:roll,:address)";
    $result=$conn->prepare($sql);
    
    $result->bindParam(':name',$name,PDO::PARAM_STR);
    $result->bindParam(':roll',$roll,PDO::PARAM_INT);
    $result->bindParam(':address',$address,PDO::PARAM_STR);
    $name=$_REQUEST['name'];
    $roll=$_REQUEST['roll'];
    $address=$_REQUEST['address'];
    $result->execute();
   echo $result->rowCount() ."<h2>Row Inserted</h2>"; 
   
 }

}





//try {
 //   $sql="INSERT INTO student (name,roll,address) VALUES(?, ? ,?)";
   // $result=$conn->prepare($sql);
 /*   $result->bindParam(1,$name,PDO::PARAM_STR);
    $result->bindParam(2,$roll,PDO::PARAM_INT);
    $result->bindParam(3,$address,PDO::PARAM_STR);
   $name="Ishita";
   $roll=117;
   $address="Jaipur";
   $result->execute();
   echo $result->rowCount() ."<h2>Row Inserted</h2>"; 
   */
   
//ALSO USE ONLY EXECUTE
/*$result->execute(['Ali' ,118, 'Hydrabad']);
echo $result->rowCount() ."<h2>Row Inserted</h2>";

} catch (PDOException $e) {
   echo  $e->getMessage();
}
*/
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