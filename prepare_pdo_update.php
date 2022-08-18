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
$sql="UPDATE student SET name= :name, roll =:roll, address =:address WHERE id= :id";
$result=$conn->prepare($sql);
$result->bindParam(':name', $name,PDO::PARAM_STR);
$result->bindParam(':roll', $roll,PDO::PARAM_STR);
$result->bindParam(':address', $address,PDO::PARAM_STR);
$result->bindParam(':id', $id,PDO::PARAM_INT);
$name="Ramya";
$roll=117;
$address="Maharastra";
$id=17;
$result->execute();
echo $result->rowCount() ."Updated succesuuly";
unset($result);
$conn=null

?>