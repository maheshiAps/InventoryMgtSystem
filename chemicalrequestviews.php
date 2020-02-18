<?php include 'header.php'; ?>
 <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="row">
                   <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    
                     <h2> Chemical Request Management</h2>
                      <a href="chemicalrequest.php" class="btn btn-danger fa fa-plus">Add</a></div>
                     </div>


<?php
 include 'dbcon.php';

$sel=mysqli_query($con,"SELECT * FROM chemrequest WHERE  Rstatus='0' AND status='1'");
$row=mysqli_num_rows($sel);


$select=mysqli_query($con,"SELECT * FROM chemrequest WHERE  Rstatus='1' AND status='1'");
$row2=mysqli_num_rows($select);

$sele=mysqli_query($con,"SELECT * FROM chemrequest WHERE  Rstatus='0' AND status='0'");
$row3=mysqli_num_rows($sele);


 ?>  

               <div class="card-body">
				<div class="row">
		
				<div class="col-md-12">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home4" role="tab" aria-controls="home">
                      <i class="fa fa-hourglass-2"></i><b>Requested</b> 
                      <span class="badge badge-success"><?php echo $row; ?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile">
                      <i class="fa fa-check"></i><b>Accepted</b>  
                      <span class="badge badge-pill badge-danger"><?php echo $row2; ?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                   <a class="nav-link" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile">
                      <i class="fa fa-close"></i> <b>Canceled </b>
                      <span class="badge badge-pill badge-danger"><?php echo $row3; ?></span>
                    </a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="home4" role="tabpanel"><div class="col-12">
             
                    <table class="table table-responsive-sm table-striped" id="myTable1">
                      <thead class="table-dark">
                        <tr>
                          
                          <th>Employee</th>
                          <th>Chem Name</th>
                          <th>Chem type</th>
                          <th>Date</th>
                          <th>Qty</th>
                          <th></th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php 

                          $sql=mysqli_query($con,"SELECT * FROM chemrequest WHERE  Rstatus='0' AND status='1'");
                          while($row=mysqli_fetch_array($sql)){
                           $chemid=$row['ChemName'];

                            echo '<td>'.$row['Emp'].'</td>';
                          

                            $chemnm=mysqli_query($con,"SELECT * FROM chemlist WHERE Id='$chemid' ");
                           while ($roww=mysqli_fetch_array($chemnm)) {
                            echo '<td>'.$roww['ChemName'].'</td>';
                           }
                            ?>

                          <td><?php echo $row['ChemType']; ?></td>
                          <td><?php echo $row['Datee']; ?></td>
                          <td><?php echo $row['Qty']; ?></td>
                          <td>
                            <span class="badge badge-success">Active</span>
                          </td>
                          
                           </tr>

                          <?php

                          }

                           ?>
                       
                        
                      </tbody>
                    </table>
                   
                  </div>
                </div>
         
                  <div class="tab-pane" id="profile4" role="tabpanel"><table class="table table-responsive-sm table-striped" id="myTable1">
                      <thead class="table-dark">
                        <tr>
                          
                          <th>Employee</th>
                          <th>Chem Name</th>
                          <th>Chem type</th>
                          <th>Date</th>
                          <th>Qty</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php 

                          $sql=mysqli_query($con,"SELECT * FROM chemrequest WHERE  Rstatus='1' AND status='1'");
                          while($row=mysqli_fetch_array($sql)){
                           $chemid=$row['ChemName'];

                            echo '<td>'.$row['Emp'].'</td>';
                          

                            $chemnm=mysqli_query($con,"SELECT * FROM chemlist WHERE Id='$chemid' ");
                           while ($roww=mysqli_fetch_array($chemnm)) {
                            echo '<td>'.$roww['ChemName'].'</td>';
                           }
                            ?>

                          <td><?php echo $row['ChemType']; ?></td>
                          <td><?php echo $row['Datee']; ?></td>
                          <td><?php echo $row['Qty']; ?></td>
                          <td>
                            <span class="badge badge-success">Active</span>
                          </td>
                          <td></td>

                          <?php

                          }

                           ?>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane" id="messages4" role="tabpanel"> <table class="table table-responsive-sm table-striped" id="myTable1">
                      <thead class="table-dark">
                        <tr>
                          
                          <th>Employee</th>
                          <th>Chem Name</th>
                          <th>Chem type</th>
                          <th>Date</th>
                          <th>Qty</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php 

                          $sql=mysqli_query($con,"SELECT * FROM chemrequest WHERE  Rstatus='0' AND status='0'");
                          while($row=mysqli_fetch_array($sql)){
                           $chemid=$row['ChemName'];

                            echo '<td>'.$row['Emp'].'</td>';
                          

                            $chemnm=mysqli_query($con,"SELECT * FROM chemlist WHERE Id='$chemid' ");
                           while ($roww=mysqli_fetch_array($chemnm)) {
                            echo '<td>'.$roww['ChemName'].'</td>';
                           }
                            ?>

                          <td><?php echo $row['ChemType']; ?></td>
                          <td><?php echo $row['Datee']; ?></td>
                          <td><?php echo $row['Qty']; ?></td>
                          <td>
                            <span class="badge badge-success">Active</span>
                          </td>
                          <td></td>

                          <?php

                          }

                           ?>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

	</div>

<?php 
include 'footer.php';
include 'scripts.php';
 ?>
 <script>
 
  
  $(function () {
    $('#myTable1').DataTable();
    $('#myTable2').DataTable();
    $('#myTable3').DataTable();
  })
</script>
 