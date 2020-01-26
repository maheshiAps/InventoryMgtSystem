<?php
session_start();
$user=$_SESSION['usernm'];


$adate=date('Y-m-d');
// echo $user.$adate.$rstatus;
// // include'dbcon.php';
$connect= new PDO("mysql:host=localhost;dbname=chem","root","");
$insert="INSERT INTO chemissue(ChemName,ChemType,Datee,Emp,Qty,Dpt,Batch) VALUES(:chem,:chemtype,:datee,:emp,:qty,:dpt,:batch)";

// $query = "INSERT INTO division (zoneID,division) VALUES (:first_name,:last_name)";

for($count = 0; $count<count($_POST['hidden_chem']); $count++)
{
	$data = array(
		':chem'	=>	$_POST['hidden_chem'][$count],
		':chemtype'	=>	$_POST['hidden_astype'][$count],
		':batch'	=>	$_POST['btch'],
		':dpt'	=>	$_POST['dpt'],
				
		':datee'	=>	$adate,
		':emp'	=>	$user,
		
		':qty'	=>	$_POST['hidden_qty'][$count]
	

	);
	var_dump($data);
	$statement = $connect->prepare($insert);
	$statement->execute($data);
}

?>
