<?php
session_start();
$user=$_SESSION['usernm'];
$rstatus='0';
$status='1';

$adate=date('Y-m-d');
echo $user.$adate.$rstatus;
// include'dbcon.php';
$connect= new PDO("mysql:host=localhost;dbname=chem","root","");
$insert="INSERT INTO chemrequest(ChemName,ChemType,Datee,Emp,Rstatus,Qty,status) VALUES(:chem,:chemtype,:datee,:emp,:rstatus,:qty,:status)";

// $query = "INSERT INTO division (zoneID,division) VALUES (:first_name,:last_name)";

for($count = 0; $count<count($_POST['hidden_chem']); $count++)
{
	$data = array(
		':chem'	=>	$_POST['hidden_chem'][$count],
		':chemtype'	=>	$_POST['hidden_astype'][$count],
				
		':datee'	=>	$adate,
		':emp'	=>	$user,
		':rstatus'	=>	$rstatus,
		':qty'	=>	$_POST['hidden_qty'][$count],
		':status'	=>	$status

	);
	var_dump($data);
	$statement = $connect->prepare($insert);
	$statement->execute($data);
}

?>
