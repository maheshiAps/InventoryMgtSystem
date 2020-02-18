 <?php
include ('dbcon.php');
//pass qty and amont of the spare part
if($_POST['id']){

  $stype=$_POST['id'];

  $find=mysqli_query($con,"SELECT SUM(i.Qty) as iqty, c.Qty  FROM chemical c, chemissue i WHERE i.ChemName='$stype' AND c.ChemName='$stype' AND i.ChemName=c.ChemName");
  $data=array();
  while($r=mysqli_fetch_array($find)){
    $data[]=array(
      'qty'=>$r['Qty']-$r['iqty'],
      

    );
    
  }
  echo (json_encode($data));
    
  }
 

      
  

?>

 