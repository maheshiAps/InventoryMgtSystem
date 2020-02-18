<?php include 'header.php';
include 'dbcon.php';
?>
<div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="row">
                   <div class="col-lg-12">
	
	 	
              
               
                  <div class="card-header">
                    <h2>Chemical Management</h2> 
                    <h4 class="fa fa-list">Chemical List</h4> 
                  
                    
                  </div>
                  <div class="card-body">
                    <div id="accordion" role="tablist">
                      <div class="card mb-0">
                        <div class="card-header" id="headingOne" role="tab">
                          <h5 class="mb-0">
                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Solid Chemicals</a>
                            <a href="chemicals.php" class="btn btn-dark btn-sm fa fa-plus">Add</a>
                          </h5>
                        </div>
                        <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="card-body ">
                          	<table  id ="myTable1" class="table table-responsive-sm table-striped">
							<thead class="table-dark">
									<tr  >
										<th>Id</th>
										<th>Chemical Name</th>

										
										<th>Min Level</th>
										
								
									</tr>
								</thead>
								<tbody>
									<?php 


		$request=mysqli_query($con,"SELECT * FROM chemlist WHERE ChemType='1'");

	while($row=mysqli_fetch_array($request)){
				$id=$row['Id'];
				$chemnm=$row['ChemName'];
				$chemtype=$row['ChemType'];
				$find=mysqli_query($con,"SELECT * FROM chemtype WHERE Id='$chemtype'");
				while($roww=mysqli_fetch_array($find)){
					$unit=$roww['Unit'];
				}
				$minpoint=$row['Minpoint'];
				
			
				?>
									<tr>
										<td><?php echo $id; ?></td>
										
									
										<td><?php echo $chemnm; ?></td>
										<td><?php echo $minpoint.$unit; ?> </td>
										
										
									
										
										
									</tr>
									<?php } ?>
								</tbody>
					</table>
				</div>
                </div>
               </div>
                  <div class="card mb-0">
                        <div class="card-header" id="headingTwo" role="tab">
                          <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Liquid Chemicals</a>
                             <a href="chemicals.php" class="btn btn-dark btn-sm fa fa-plus">Add</a>
                          </h5>
                        </div>
                        <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                          <div class="card-body"><table  id ="myTable2" class="table table-responsive-sm table-striped">
							<thead class="table-dark">
									<tr  >
										<th>Id</th>
										<th>Chemical Name</th>

										
										<th>Min Level</th>
										
								
									</tr>
								</thead>
								<tbody>
									<?php 


		$request=mysqli_query($con,"SELECT * FROM chemlist WHERE ChemType='2'");

	while($row=mysqli_fetch_array($request)){
				$id=$row['Id'];
				$chemnm=$row['ChemName'];
				$chemtype=$row['ChemType'];
				$find=mysqli_query($con,"SELECT * FROM chemtype WHERE Id='$chemtype'");
				while($roww=mysqli_fetch_array($find)){
					$unit=$roww['Unit'];
				}
				$minpoint=$row['Minpoint'];
				
			
				?>
									<tr>
										<td><?php echo $id; ?></td>
										
									
										<td><?php echo $chemnm; ?></td>
										<td><?php echo $minpoint.$unit; ?> </td>
										
										
									
										
										
									</tr>
									<?php } ?>
								</tbody>
					</table>
                        </div>
                        </div>
                      </div>
               
                      <div class="card mb-0">
                        <div class="card-header" id="headingThree" role="tab">
                          <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Equipments</a>
                            <a href="equipemntadd.php" class="btn btn-dark btn-sm fa fa-plus">Add</a>
                          </h5>
                        </div>
                        <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                          <div class="card-body"><table  id ="myTable3" class="table table-responsive-sm table-striped">
							<thead class="table-dark">
									<tr  >
										<th>Id</th>
										<th>Equipment Name</th>

										
										<th>Min Level</th>
										
								
									</tr>
								</thead>
								<tbody>
									<?php 


		$request=mysqli_query($con,"SELECT * FROM equipementlist");

	while($row=mysqli_fetch_array($request)){
				$id=$row['Id'];
				$equnm=$row['EquipmentName'];
				$minpoint=$row['Minpoint'];
				
			
				?>
									<tr>
										<td><?php echo $id; ?></td>
										
									
										<td><?php echo $equnm; ?></td>
										<td><?php echo $minpoint.$unit; ?> </td>
										
										
									
										
										
									</tr>
									<?php } ?>
								</tbody>
					</table></div>
                        </div>
                      </div>
                

                       <div class="card mb-0">
                        <div class="card-header" id="headingFour" role="tab">
                          <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Other Material</a>
                            <a href="material.php" class="btn btn-dark btn-sm fa fa-plus">Add</a>
                          </h5>
                        </div>
                        <div class="collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
                          <div class="card-body"><table  id ="myTable4" class="table table-responsive-sm table-striped">
							<thead class="table-dark">
									<tr  >
										<th>Id</th>
										<th>Material Name</th>

										
										<th>Min Level</th>
										
								
									</tr>
								</thead>
								<tbody>
									<?php 


		$request=mysqli_query($con,"SELECT * FROM materiallist");

	while($row=mysqli_fetch_array($request)){
				$id=$row['Id'];
				$matnm=$row['MaterialName'];
				$minpoint=$row['Minpoint'];
				
			
				?>
									<tr>
										<td><?php echo $id; ?></td>
										
									
										<td><?php echo $matnm; ?></td>
										<td><?php echo $minpoint.$unit; ?> </td>
										
										
									
										
										
									</tr>
									<?php } ?>
								</tbody>
					</table>
				</div>
               </div>
              </div>
             </div>
            </div>
          </div>




</div>
	

<?php 
include 'scripts.php';
include 'footer.php';

?>

</body>
</html>
<script>$( "#accordion" ).accordion();</script>
<!--  <script>
  
  $(function () {
    $('#myTable1').DataTable();
    $('#myTable2').DataTable();
    $('#myTable3').DataTable();
    $('#myTable4').DataTable();
  })
</script> -->